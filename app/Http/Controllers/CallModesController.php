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
      $callmode = CallMode::find($id);
      return view('callmodes.show',compact('callmode'));
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
}
