<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserTypesRequest;

use \App\Entities\UserType\UserType;

class UserTypesController extends Controller
{
  public function index()
  {
      $usertypes = \App\Entities\UserType\UserType::paginate(10);
      return view('usertypes.index', compact('usertypes'));
  }

  public function create()
  {
      return view('usertypes.create');
  }

  public function store(UserTypesRequest $request)
  {
      $usertype = UserType::create([
          'name'=>$request['name'],
          'administrator'=> isset($request['administrator']) ? 1 : 0,
          'onlyyourplace'=> isset($request['onlyyourplace']) ? 1 : 0
      ]);
      return redirect()->route('usertypes.index');
  }

  public function show($id)
  {
      $usertype = UserType::find($id);
      return view('usertypes.show',compact('usertype'));
  }

  public function edit($id)
  {
      $usertype = UserType::find($id);
      return view('usertypes.edit', compact('usertype'));
  }

  public function update(UserTypesRequest $request, $id)
  {
      $usertype = UserType::find($id)->update([
          'name'=>$request['name'],
          'administrator'=> isset($request['administrator']) ? 1 : 0,
          'onlyyourplace'=> isset($request['onlyyourplace']) ? 1 : 0
      ]);
      return redirect()->route('usertypes.index');
  }

  public function destroy($id)
  {
      return redirect()->route('usertypes.index');
  }
}
