<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteSomeColumnsInQTContsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('q_t_conts', function (Blueprint $table) {
			$table->string('bainang');
			$table->string('baiha');
			$table->integer('trongluong');
			$table->string('dieuxe');
			$table->string('diadiemdongtrahang');
			$table->integer('phinangchuaVAT');
			$table->integer('VATphinang');
			$table->string('sohoadonnang');
			$table->date('nxuathoadonnang');
			$table->string('dvicaphoadonnang');
			$table->integer('phihachuaVAT');
			$table->integer('VATphiha');
			$table->string('sohoadonha');
			$table->date('nxuathoadonha');
			$table->string('dvicaphoadonha');
			$table->integer('boctokhai');
			$table->integer('hquantiepnhan');
			$table->integer('hquangiamsat');
			$table->integer('hquankiemhoa');
			$table->integer('cuoccont');
			$table->integer('llenhhangtau');
			$table->integer('luucont');
			$table->integer('luubai');
			$table->integer('phivesinh');
			$table->integer('phicatday');
			$table->integer('boctem');
			$table->integer('kddtvchuaVAT');
			$table->integer('VATkddtv');
			$table->integer('phingoaikddtv');
			$table->integer('cackhoankhacchokhach');
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
			$table->dropColumn('bainang');
			$table->dropColumn('baiha');
			$table->dropColumn('trongluong');
			$table->dropColumn('dieuxe');
			$table->dropColumn('diadiemdongtrahang');
			$table->dropColumn('phinangchuaVAT');
			$table->dropColumn('VATphinang');
			$table->dropColumn('sohoadonnang');
			$table->dropColumn('nxuathoadonnang');
			$table->dropColumn('dvicaphoadonnang');
			$table->dropColumn('phihachuaVAT');
			$table->dropColumn('VATphiha');
			$table->dropColumn('sohoadonha');
			$table->dropColumn('nxuathoadonha');
			$table->dropColumn('dvicaphoadonha');
			$table->dropColumn('boctokhai');
			$table->dropColumn('hquantiepnhan');
			$table->dropColumn('hquangiamsat');
			$table->dropColumn('hquankiemhoa');
			$table->dropColumn('cuoccont');
			$table->dropColumn('llenhhangtau');
			$table->dropColumn('luucont');
			$table->dropColumn('luubai');
			$table->dropColumn('phivesinh');
			$table->dropColumn('phicatday');
			$table->dropColumn('boctem');
			$table->dropColumn('kddtvchuaVAT');
			$table->dropColumn('VATkddtv');
			$table->dropColumn('phingoaikddtv');
			$table->dropColumn('cackhoankhacchokhach');
        });
    }
}
