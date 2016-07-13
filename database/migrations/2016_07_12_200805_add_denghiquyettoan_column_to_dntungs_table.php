<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDenghiquyettoanColumnToDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dntungs', function (Blueprint $table) {
			$table->boolean('denghiquyettoan')->default(false);
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
			$table->dropColumn('denghiquyettoan');
        });
    }
}
