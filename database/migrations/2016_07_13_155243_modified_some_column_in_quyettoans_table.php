<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifiedSomeColumnInQuyettoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quyettoans', function (Blueprint $table) {
			$table->dropColumn('stclai');
			$table->string('dvtinh');
			$table->integer('soluong');
			$table->integer('dongia');
			$table->integer('VAT');
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
        Schema::table('quyettoans', function (Blueprint $table) {
			$table->integer('stclai');
			$table->dropColumn('dvtinh');
			$table->dropColumn('soluong');
			$table->dropColumn('dongia');
			$table->dropColumn('VAT');
			$table->dropColumn('tong');
        });
    }
}
