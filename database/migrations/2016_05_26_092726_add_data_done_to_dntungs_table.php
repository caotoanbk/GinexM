<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataDoneToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->date('date_done');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->dropColumn('date_done');
        });
    }
}
