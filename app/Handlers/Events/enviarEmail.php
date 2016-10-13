<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

namespace App\Handlers\Events;

use App\Events\statusCall;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class enviarEmail
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
     * @param  statusCall  $event
     * @return void
     */
    public function handle(statusCall $event)
    {
        $call = $event->getCall();
        if(filter_var($call->place->email, FILTER_VALIDATE_EMAIL)){
            \Mail::send('emails.statusCall', ['call'=>$call], function ($m) use ($call) {
                $m->from('suportesme@franca.sp.gov.br', 'Suporte S.M.E.');
                $m->to($call->place->email)->subject('Suporte - Chamado técnico');
            });
        }
    }
}
