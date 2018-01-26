<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\User\User;
use App\Entities\Login\Login;
use Input;
use Auth;
use Session;

class AuthController extends Controller
{
    public function getLogin()
    {
        if(!Auth::guest())
            return redirect('home');

        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autenticação
        if (Auth::attempt(['email' => Input::get('email'),
                           'password' => Input::get('password')])){

            if(Auth::user()->locked == "0"){

                Login::create(['user_id'=>Auth::user()->id,
                               'ip'=>$request->ip(),
                               'method'=>'login']);

                //desloga o usuario de outras sessões
                $user = Auth::user();
                if($user->session_id)
                    Session::getHandler()->destroy($user->session_id);
                $user->session_id = Session::getId();
                $user->save();

                return redirect()->intended('home');
                //return redirect('home');
            }

            Auth::logout();
            return redirect()->route('getLogin')
                             ->with('flash_error', 'Usuário bloqueado.');
        }
        return redirect()->route('getLogin')
                         ->with('flash_error', 'E-mail/Senha inválidos.')
                         ->withInput();

    }

    public function getLogout(Request $request)
    {

        Login::create(['user_id'=>Auth::user()->id,
                       'ip'=>$request->ip(),
                       'method'=>'logout']);
        Auth::logout();

        return redirect('home');
    }
}