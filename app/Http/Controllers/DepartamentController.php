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

use App\Http\Requests\DepartamentRequest;
use App\Entities\Departament\Departament;
use Illuminate\Support\Facades\Response;
use Auth;

class DepartamentController extends Controller
{

    public function index()
    {
        $departaments = new Departament;

        $filter = isset($_GET['search']) ? trim($_GET['search']) : '';
        if($filter != ''){
          $departaments = $departaments->where('name','like','%'.$filter.'%');
        }

        $departaments = $departaments->orderBY('name')->paginate(10);
        return view('departaments.index', compact('departaments'));
    }

    public function create()
    {
        return view('departaments.create');
    }

    public function store(DepartamentRequest $request)
    {
        $departament = Departament::Create($request->all());
        return redirect()->route('departaments.index');
    }

    public function show($id)
    {
        $departament = \App\Entities\Departament\Departament::find($id);
        return view('departaments.show',compact('departament'));
    }

    public function edit($id)
    {
        $departament = Departament::find($id);
        return view('departaments.edit', compact('departament'));
    }

    public function update(DepartamentRequest $request, $id)
    {
        $departament = Departament::find($id)->update($request->all());
        return redirect()->route('departaments.index');
    }

    public function destroy($id)
    {
        //
    }

    public function departamentsJson(){
        if(Auth::user()->usertype->onlyyourplace == "1"){
            $departaments = Departament::where('id', Auth::user()->place->departament_id)->orderBy('name')->getQuery()->get(['name','id']);
        }else{
            $departaments = Departament::orderBy('name')->getQuery()->get(['name','id']);
        }
        return Response::json($departaments);
    }
}
