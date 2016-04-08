<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhiChiTietToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->string('reason');
			$table->integer('cuoc');
			$table->integer('nang');
			$table->integer('ha');
			$table->integer('hquan');
			$table->integer('psinh');
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
			$table->dropColumn('reason');
			$table->dropColumn('cuoc');
			$table->dropColumn('nang');
			$table->dropColumn('ha');
			$table->dropColumn('hquan');
			$table->dropColumn('psinh');
        });
    }
}
