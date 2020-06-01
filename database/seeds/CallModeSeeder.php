<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Seeder;

use App\Entities\CallMode\CallMode;

class CallModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      CallMode::create([
          'name' => 'Local'
      ]);
      CallMode::create([
          'name' => 'Remoto'
      ]);
    }
}
