<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('callhistories', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('call_id')->unsigned();
          $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('status_id')->unsigned();
          $table->foreign('status_id')->references('id')->on('callstatuses')->onDelete('cascade');
          $table->string('description');
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
        Schema::drop('callhistories');
    }
}
