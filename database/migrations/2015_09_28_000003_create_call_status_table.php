<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('callstatuses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->string('color')->default("default");
          $table->string('icon');
          $table->integer('isstart')->default(0);
          $table->integer('isend')->default(0);
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
        Schema::drop('callstatuses');
    }
}
