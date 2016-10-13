<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usertype_id')->unsigned();
            $table->foreign('usertype_id')->references('id')->on('usertypes')->onDelete('cascade');
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->integer('register')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('locked')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
