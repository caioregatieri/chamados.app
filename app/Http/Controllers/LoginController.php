<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Controllers;

use Input;

use App\Http\Controllers\Controller;
use App\Entities\Login\Login;
use App\Entities\User\User;

class LoginController extends Controller
{
    public function index()
    {
        $name =        Input::get('search');
        $created_at =  Input::get('created_at');

        $users = User::all()->sortBy('name');
        $logins = new Login;

        if($name != ''){
            $logins = $logins->where('user_id','=',$_GET['user']);
        }

        if($created_at != ''){
            $logins = $logins->whereBetween('created_at', explode(' - ', str_replace('/', '-', $created_at)) ); 
        }

        $logins = $logins->orderBy('created_at','DESC')->paginate(10);
        return view('login.index', compact('logins','users'));
    }
}
