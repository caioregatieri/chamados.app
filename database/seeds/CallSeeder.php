<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\Call\Call;
use App\Entities\CallHistory\CallHistory;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $call_1 = Call::create([
        'user_id'=>'2',
        'place_id'=>'2',
        'mode_id'=>'1',
        'requester'=>'Limitado',
        'requester_email'=>'limitado@email.com',
        'title'=>'Chamado teste',
        'description'=>'Um chamado de teste'
      ]);
      CallHistory::create([
        'call_id' => $call_1->id, 
        'user_id' => '2', 
        'description' => 'Aguardando...',
        'status_id' => '1'
      ]);

      $call_2 = Call::create([
        'user_id'=>'1',
        'place_id'=>'1',
        'mode_id'=>'1',
        'requester'=>'Administrador',
        'requester_email'=>'admin@admin.com',
        'title'=>'Chamado teste 2',
        'description'=>'Um chamado de teste 2'
      ]);
      CallHistory::create([
        'call_id' => $call_2->id, 
        'user_id' => '2', 
        'description' => 'Aguardando...',
        'status_id' => '1'
      ]);
      CallHistory::create([
        'call_id' => $call_2->id, 
        'user_id' => '2', 
        'description' => 'Verificando...',
        'status_id' => '3'
      ]);
    }
}