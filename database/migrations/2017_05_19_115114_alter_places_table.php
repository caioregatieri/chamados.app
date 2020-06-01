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
        $table->string('ip_range')->nullable();
        $table->string('computer_names')->nullable();
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
        $table->dropColumn('ip_range');
        $table->dropColumn('computer_names');
      });
    }
}
