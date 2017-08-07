<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PlaceRequest;
use Illuminate\Support\Facades\Response;
use \App\Entities\Place\Place;
use \App\Entities\Departament\Departament;
use Input;
use Auth;

class PlacesController extends Controller
{

    public function index()
    {
        $name =        Input::get('search');
        $departament = Input::get('departament','');

        $places = new Place;

        if($name != ''){
          $places = $places->where('prefix','like','%'.$name.'%');
          $places = $places->orWhere('name','like','%'.$name.'%');
        }

        if($departament != ''){
          $places = $places->where('departament_id','=',$departament);
        }

        $places = $places->orderBy('name')->paginate(10);

        if($name != '')
          $places->appends(['search'=>$name]);

        if($departament != '')
          $places->appends(['departament'=>$departament]);

        $departaments = Departament::orderBy('name')->get();
        return view('places.index', compact('places','departaments'));
    }

    public function create()
    {
        $departaments = Departament::lists('name','id');
        return view('places.create', compact('departaments'));
    }

    public function store(PlaceRequest $request)
    {
        $place = Place::create($request->all());
        \Session::flash('created', $place);
        return redirect()->route('places.index');
    }

    public function show($id)
    {
        $place = Place::find($id);
        return view('places.show',compact('place'));
    }

    public function edit($id)
    {
        $place =        Place::find($id);
        $departaments = Departament::lists('name','id');
        return view('places.edit', compact('place','departaments'));
    }

    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        $place->departament_id = $request['departament_id'];
        $place->prefix = $request['prefix'];
        $place->name = $request['name'];
        $place->neighborhood = $request['neighborhood'];
        $place->address = $request['address'];
        $place->number = $request['number'];
        $place->telephone1 = $request['telephone1'];
        $place->telephone2 = $request['telephone2'];
        $place->responsavel = $request['responsavel'];
        $place->email = $request['email'];
        $place->lat = $request['lat'];
        $place->lon = $request['lon'];
        $place->region = $request['region'];
        $place->ip_range = $request['ip_range'];
        $place->computer_names = $request['computer_names'];
        $place->note = $request['note'];
        $place->save();
        \Session::flash('updated', $place);
        return redirect()->route('places.index');
    }

    public function destroy($id)
    {
        return redirect()->route('places.index');
    }

    public function placesJson($departament_id){
        if(Auth::user()->usertype->onlyyourplace == "1"){
            $places = Place::where('departament_id', Auth::user()->place->departament_id)->orderBy('name')->getQuery()->get(['prefix','name','id']);
        }else{
            $places = Place::where('departament_id', $departament_id)->orderBy('name')->getQuery()->get(['prefix','name','id']);
        }
        return Response::json($places);
    }
}
