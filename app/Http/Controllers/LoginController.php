<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\Login\Login;
use App\Entities\User\User;

class LoginController extends Controller
{
    public function index()
    {

        $users = User::all()->sortBy('name');
        $logins = new Login;

        $filter = isset($_GET['user']) ? trim($_GET['user']) : '';
        if($filter != ''){
          $logins = $logins->where('user_id','=',$_GET['user']);
        }

        $logins = $logins->orderBy('created_at','DESC')->paginate(10);
        return view('login.index', compact('logins','users'));
    }
}
