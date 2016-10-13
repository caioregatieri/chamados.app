<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallModesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('callmodes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name')->unique();
        $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::create('callmodes');
  }
}
