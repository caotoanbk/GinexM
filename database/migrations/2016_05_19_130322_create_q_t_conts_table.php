<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQTContsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_t_conts', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('dntung_id');
			$table->date('nxchay');
			$table->string('bsxe');
			$table->string('lxe');
			$table->string('scont');
			$table->string('ccont');
			$table->string('lcont');
			$table->string('nxe');
			$table->integer('pnha');
			$table->integer('khquan');
			$table->integer('cxe');
			$table->integer('cgui');
			$table->integer('cmua');
			$table->integer('gvcVAT');
			$table->integer('cbcVAT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('q_t_conts');
    }
}
