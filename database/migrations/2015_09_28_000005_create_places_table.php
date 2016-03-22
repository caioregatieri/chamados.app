<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('places', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('departament_id')->unsigned();
          $table->foreign('departament_id')->references('id')->on('departaments')->onDelete('cascade');
          $table->string('name');
          $table->string('prefix')->nullable();
          $table->string('neighborhood');
          $table->string('address');
          $table->string('number');
          $table->string('telephone1');
          $table->string('telephone2')->nullable();
          $table->string('responsavel')->nullable();
          $table->string('email')->nullable();
          $table->float('lat')->nullable();
          $table->float('lon')->nullable();
          $table->string('region');
          $table->string('note')->nullable();

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
        Schema::drop('places');
    }
}
