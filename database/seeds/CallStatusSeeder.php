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
          'name' => 'Waiting',
          'color' => 'warning',
          'isstart' => '1',
          'icon' => 'fa-clock-o',
          'isend' => '0'
      ]);
      CallStatus::create([
          'name' => 'Canceled',
          'color' => 'danger',
          'icon' => 'fa-ban',
          'isstart' => '0',
          'isend' => '1'
      ]);
      CallStatus::create([
          'name' => 'In progress',
          'color' => 'info',
          'icon' => 'fa-spinner',
          'isstart' => '0',
          'isend' => '0'
      ]);
      CallStatus::create([
          'name' => 'Finalized',
          'color' => 'success',
          'icon' => 'fa-check',
          'isstart' => '0',
          'isend' => '1'
      ]);
    }
}