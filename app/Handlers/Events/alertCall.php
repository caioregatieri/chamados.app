<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

namespace App\Handlers\Events;

use App\Events\createCall;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class alertCall
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  createCall  $event
     * @return void
     */
    public function handle(createCall $event)
    {
        $call = $event->getCall();
        //if(filter_var($call->place->email, FILTER_VALIDATE_EMAIL)){
            \Mail::send('emails.createCall', ['call'=>$call], function ($m) use ($call) {
                $m->from('suportesme@franca.sp.gov.br', 'Suporte S.M.E.');
                $m->to('suportesme@franca.sp.gov.br')->subject('Suporte - Novo chamado técnico');
            });
        //}
    }
}
