<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallFile extends Migration
{
    public function up()
    {
        Schema::create('callfiles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('call_id')->unsigned();
          $table->foreign('call_id')->references('call')->on('id')->onDelete('cascade');
          $table->string('filename');
          $table->timestamps();
      });
    }

    public function down()
    {
        Schema::drop('callfiles');
    }
}
