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

use App\Http\Requests\CallStatusRequest;

use \App\Entities\CallStatus\CallStatus;

class CallStatusController extends Controller
{
  public function index()
  {
      $callstatuses = CallStatus::paginate(10);
      return view('callstatus.index', compact('callstatuses'));
  }

  public function create()
  {
      return view('callstatus.create');
  }

  public function store(CallStatusRequest $request)
  {
      $callstatus = CallStatus::Create($request->all());
      return redirect()->route('callstatus.index');
  }

  public function show($id)
  {
      $callstatus = CallStatus::find($id);
      return view('callstatus.show',compact('callstatus'));
  }

  public function edit($id)
  {
      $callstatus = CallStatus::find($id);
      return view('callstatus.edit', compact('callstatus'));
  }

  public function update(CallStatusRequest $request, $id)
  {
      $callstatus = CallStatus::find($id)->update($request->all());
      return redirect()->route('callstatus.index');
  }

  public function destroy($id)
  {
      //
  }
}
