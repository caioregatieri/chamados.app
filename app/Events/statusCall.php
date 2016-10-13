<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Entities\Call\Call;

class statusCall extends Event
{
    use SerializesModels;

    private $call;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Call $call)
    {
        $this->call = $call;
    }

    public function getCall(){
      return $this->call;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
