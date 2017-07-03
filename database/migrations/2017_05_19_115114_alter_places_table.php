<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('places', function (Blueprint $table) {
        $table->string('ip_range');
        $table->string('computer_names');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('places', function (Blueprint $table) {
        $table->dropColumn('ip_range')->nullable();
        $table->dropColumn('computer_names')->nullable();
      });
    }
}
