<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('calls', function (Blueprint $table) {
        $table->string('requester')->nullable();
        $table->string('register')->nullable();
        $table->boolean('has_transfers')->nullable();
        $table->string('requester_email')->nullable();
        $table->text('note')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('calls', function (Blueprint $table) {
        $table->dropColumn('requester');
        $table->dropColumn('register');
        $table->dropColumn('has_transfers');
        $table->dropColumn('requester_email');
        $table->dropColumn('note');
      });
    }
}
