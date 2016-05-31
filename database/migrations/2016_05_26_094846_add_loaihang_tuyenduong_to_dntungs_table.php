<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoaihangTuyenduongToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->string('loaihang');
			$table->string('tuyenduong');
			$table->string('khachhang');
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
			$table->dropColumn('loaihang');
			$table->dropColumn('tuyenduong');
			$table->dropColumn('khachhang');
        });
    }
}
