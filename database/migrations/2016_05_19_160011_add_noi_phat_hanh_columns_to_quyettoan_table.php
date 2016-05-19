<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoiPhatHanhColumnsToQuyettoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quyettoans', function (Blueprint $table) {
			$table->string('nphanh');
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
			$table->dropColumn('nphanh');
        });
    }
}
