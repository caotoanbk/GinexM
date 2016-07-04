<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNyeucauNgiaohangNnhanhangToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->date('nyeucau');
			$table->date('ngiaohang');
			$table->date('nnhanhang');
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
			$table->dropColumn('nyeucau');
			$table->dropColumn('ngiaohang');
			$table->dropColumn('nnhanhang');
        });
    }
}
