<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGvdchinhToQTContTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('q_t_conts', function (Blueprint $table) {
			$table->integer('gvdchinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('q_t_conts', function (Blueprint $table) {
			$table->dropColumn('gvdchinh');
        });
    }
}
