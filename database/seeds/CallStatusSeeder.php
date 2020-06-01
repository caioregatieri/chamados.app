<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\CallStatus\CallStatus;

class CallStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      CallStatus::create([
          'name' => 'Aguardando',
          'color' => 'warning',
          'isstart' => '1',
          'icon' => 'fa-clock-o',
          'isend' => '0'
      ]);
      CallStatus::create([
          'name' => 'Cancelado',
          'color' => 'danger',
          'icon' => 'fa-ban',
          'isstart' => '0',
          'isend' => '1'
      ]);
      CallStatus::create([
          'name' => 'Em andamento',
          'color' => 'info',
          'icon' => 'fa-spinner',
          'isstart' => '0',
          'isend' => '0'
      ]);
      CallStatus::create([
          'name' => 'Finalizado',
          'color' => 'success',
          'icon' => 'fa-check',
          'isstart' => '0',
          'isend' => '1'
      ]);
    }
}