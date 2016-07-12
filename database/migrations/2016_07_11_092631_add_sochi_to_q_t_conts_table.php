<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSochiToQTContsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('q_t_conts', function (Blueprint $table) {
			$table->string('sochi');
			$table->text('ghichu');
			$table->integer('tong');
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
			$table->dropColumn('sochi');
			$table->dropColumn('ghichu');
			$table->dropColumn('tong');
        });
    }
}
