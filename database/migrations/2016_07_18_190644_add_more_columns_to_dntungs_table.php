<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->string('file_extension');
			$table->boolean('curator_check_tu')->default(false);
			$table->boolean('secrectary_check_tu')->default(false);
			$table->boolean('director_check_tu')->default(false);
			$table->boolean('director_cancel_check')->default(false);
			$table->boolean('curator_cancel_check')->default(false);
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
			$table->dropColumn('file_extension');
			$table->dropColumn('curator_check_tu');
			$table->dropColumn('secrectary_check_tu');
			$table->dropColumn('director_check_tu');
			$table->dropColumn('director_cancel_check');
			$table->dropColumn('curator_cancel_check');
        });
    }
}
