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
			$table->string('stokhai');
			$table->integer('slcont');
			$table->integer('slchroi');
			$table->integer('slcnong');
			$table->integer('slclanh');
			$table->string('hangtau');
			$table->string('nhaxe');
			$table->integer('playlenh');
			$table->integer('pbtokhai');
			$table->integer('phqtiepnhan');
			$table->integer('pitokhai');
			$table->integer('pkddongvat');
			$table->integer('pkdthucvat');
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
			$table->dropColumn('stokhai');
			$table->dropColumn('slcont');
			$table->dropColumn('slchroi');
			$table->dropColumn('slcnong');
			$table->dropColumn('slclanh');
			$table->dropColumn('hangtau');
			$table->dropColumn('nhaxe');
			$table->dropColumn('playlenh');
			$table->dropColumn('pbtokhai');
			$table->dropColumn('phqtiepnhan');
			$table->dropColumn('pitokhai');
			$table->dropColumn('pkddongvat');
			$table->dropColumn('pkdthucvat');
        });
    }
}
