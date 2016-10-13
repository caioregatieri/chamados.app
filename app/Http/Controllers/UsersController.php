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

use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\PasswordRequest;

use App\Entities\Departament\Departament;
use App\Entities\Place\Place;
use App\Entities\UserType\UserType;
use App\Entities\User\User;

class UsersController extends Controller
{
  public function index()
  {
      $users = new User;

      $filter = isset($_GET['search']) ? trim($_GET['search']) : '';
      if($filter != ''){
        $users = $users->where('name','like','%'.$filter.'%');
      }

      $users = $users->paginate(10);

      return view('users.index', compact('users'));
  }

  public function create()
  {
      $departaments = Departament::lists('name','id');
      $places =       Place::lists('name','id');
      $usertypes =    UserType::lists('name','id');
      return view('users.create', compact('departaments','places','usertypes'));
  }

  public function store(UsersCreateRequest $request)
  {
      $users = User::create([
        'usertype_id' => $request['usertype_id'],
        'place_id' => $request['place_id'],
        'name' => $request['name'],
        'register' => $request['register'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'locked' => 1
      ]);
      return redirect()->route('users.index');
  }

  public function show($id)
  {
      $user = User::find($id);
      return view('users.show',compact('user'));
  }

  public function edit($id)
  {
      $user =         User::find($id);
      $departaments = Departament::lists('name','id');
      $places =       Place::lists('name','id');
      $usertypes =    UserType::lists('name','id');
      return view('users.edit', compact('user','departaments','places','usertypes'));
  }

  public function update(UsersEditRequest $request, $id)
  {
      $user = User::find($id)->update([
        'usertype_id' => $request['usertype_id'],
        'place_id' => $request['place_id'],
        'name' => $request['name'],
        'register' => $request['register'],
        'email' => $request['email'],
        'locked' => (!isset($request['locked']) ? 0 : 1)
      ]);
      return redirect()->route('users.show',['id'=>$id]);
  }

  public function destroy($id)
  {
      return redirect()->route('users.index');
  }

  public function passwordedit($id)
  {
      $user = User::find($id);
      return view('users/passwordedit', compact('user'));
  }

  public function passwordupdate(PasswordRequest $request, $id)
  {
      $user = User::find($id)->update(['password'=>bcrypt($request['password'])]);
      return redirect()->route('users.index');
  }

}
