<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginLog extends Migration
{
    public function up()
    {
        Schema::create('userlogs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
          $table->string('ip');
          $table->timestamp('created_at');
      });
    }

    public function down()
    {
        Schema::drop('userlogs');
    }
}
