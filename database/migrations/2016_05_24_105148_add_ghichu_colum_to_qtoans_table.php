<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGhichuColumToQtoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quyettoans', function (Blueprint $table) {
			$table->text('gchu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quyettoans', function (Blueprint $table) {
			$table->dropColumn('gchu');
        });
    }
}
