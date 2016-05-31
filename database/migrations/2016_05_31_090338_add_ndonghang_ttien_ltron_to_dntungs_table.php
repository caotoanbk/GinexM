<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNdonghangTtienLtronToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->date('ndonghang');
			$table->integer('ttien_ltron');
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
			$table->dropColumn('ndonghang');
			$table->dropColumn('ttien_ltron');
        });
    }
}
