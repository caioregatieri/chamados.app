<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallFile extends Migration
{
    public function up()
    {
        Schema::create('callfiles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('call_id')->unsigned();
          $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
          $table->string('filename');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    public function down()
    {
        Schema::drop('callfiles');
    }
}
