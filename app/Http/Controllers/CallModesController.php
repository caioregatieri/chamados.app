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

use App\Http\Requests\CallModesRequest;

use \App\Entities\CallMode\CallMode;
use \App\Entities\User\User;

class CallModesController extends Controller
{
  public function index()
  {
      $callmodes = CallMode::paginate(10);
      return view('callmodes.index', compact('callmodes'));
  }

  public function create()
  {
      return view('callmodes.create');
  }

  public function store(CallModesRequest $request)
  {
      $callmode = CallMode::Create($request->all());
      return redirect()->route('callmodes.index');
  }

  public function show($id)
  {
      $users = User::where('usertype_id', '1')->get();
      $callmode = CallMode::find($id);
      return view('callmodes.show', compact('users','callmode'));
  }

  public function edit($id)
  {
      $callmode = CallMode::find($id);
      return view('callmodes.edit', compact('callmode'));
  }

  public function update(CallModesRequest $request, $id)
  {
      $callmode = CallMode::find($id)->update($request->all());
      return redirect()->route('callmodes.index');
  }

  public function destroy($id)
  {
      //
  }

  public function addresponsible(Request $request, $id){
      //dd($request->all());
      $callmode = CallMode::find($id);
      foreach($callmode->responsibles as $responsible){
        if ($responsible->id == $request->user_id){
          return redirect()->back();
          exit;
        }
      }
      $callmode->responsibles()->attach($request->user_id);
      return redirect()->back();
  }

  public function delresponsible(Request $request, $id){
      //dd($request->all());
      $callmode = CallMode::find($id);
      $callmode->responsibles()->detach($request->user_id);
      return redirect()->back();
  }
}
