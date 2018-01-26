<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions\Main as OwnFunctions;

class TestController extends Controller
{
    // Acessar
    // \vendor\swiftmailer\lib\classes\Swift\Transport\StreamBuffer.php
    // e alterar a linha 248, comentando isso: $options = array()
    // e adiconando isso: $options['ssl'] = array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true);

    public function testMail(Request $request){
        return \Mail::send('emails.test', [], function ($m) use ($request) {
            $m->from(env('MAIL_USERNAME'), 'Chamados');
            $m->to($request->to)->subject('Suporte - Teste');
        });
    }

    public function testPassword(Request $request) {
        $length = isset($request->length) ? $request->length : 8;
        return OwnFunctions::generatePassword($length);
    }

}
