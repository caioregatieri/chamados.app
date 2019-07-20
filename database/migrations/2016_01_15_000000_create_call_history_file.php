<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallHistoryFile extends Migration
{
    public function up()
    {
        Schema::create('callhistoryfiles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('history_id')->unsigned();
          $table->foreign('history_id')->references('id')->on('callhistories')->onDelete('cascade');
          $table->string('filename');
          $table->timestamps();
      });
    }

    public function down()
    {
        Schema::drop('callhistoryfiles');
    }
}
