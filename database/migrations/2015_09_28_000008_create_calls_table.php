<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('calls', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
          $table->integer('mode_id')->unsigned();
          $table->foreign('mode_id')->references('callmode')->on('id')->onDelete('cascade');
          $table->integer('place_id')->unsigned();
          $table->foreign('place_id')->references('places')->on('id')->onDelete('cascade');
          $table->string('title');
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
        Schema::drop('calls');
    }
}
