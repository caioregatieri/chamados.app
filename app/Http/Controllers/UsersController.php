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

      $name = isset($_GET['name']) ? trim($_GET['name']) : '';
      if($name != ''){
        $users = $users->where('name','like','%'.$name.'%');
      }
      $usertype_id = isset($_GET['usertype_id']) ? trim($_GET['usertype_id']) : '';
      if($usertype_id != ''){
        $users = $users->where('usertype_id','=',''.$usertype_id.'');
      }
      $locked = isset($_GET['locked']) ? trim($_GET['locked']) : '';
      if($locked != ''){
        $users = $users->where('locked','=',''.$locked.'');
      }

      $users = $users->paginate(10);
      $usertypes = UserType::all();
    //   dd($usertypes);
      
      return view('users.index', compact('users','usertypes'));
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
      $user = User::create([
        'usertype_id' => $request['usertype_id'],
        'place_id' => $request['place_id'],
        'name' => $request['name'],
        'register' => $request['register'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'locked' => 1
      ]);
      \Session::flash('created', $user);
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
        'note' => $request['note'],
        'locked' => (!isset($request['locked']) ? 0 : 1),
      ]);
      \Session::flash('updated', $user);
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
