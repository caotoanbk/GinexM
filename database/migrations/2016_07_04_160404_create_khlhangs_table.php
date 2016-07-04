<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhlhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khlhangs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('khang');
			$table->string('khachhang');
			$table->string('loaihang');
			$table->string('bill');
			$table->string('stkhai');
			$table->integer('slc20');
			$table->integer('slc40');
			$table->integer('slc_hroi');
			$table->integer('slcnong');
			$table->integer('slclanh');
			$table->string('hangtau');
			$table->string('tuyenduong');
			$table->date('ndonghang');
			$table->date('ndohang');
			$table->string('nhaxe');
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
        Schema::drop('khlhangs');
    }
}
