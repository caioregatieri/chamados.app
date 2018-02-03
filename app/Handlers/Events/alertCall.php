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
        foreach($call->mode->responsibles as $responsible){
            \Mail::send('emails.createCall', ['call'=>$call], function ($m) use ($responsible) {
                $m->from('suportesme@franca.sp.gov.br', 'Suporte S.M.E.');
                $m->to($responsible->email)->subject('Suporte - Chamado técnico');
            });
        }
        //}
    }
}
