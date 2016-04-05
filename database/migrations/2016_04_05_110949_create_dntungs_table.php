<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDntungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dntungs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->string('bill');
			$table->integer('slc20');
			$table->integer('slc40');
			$table->string('lcont');
			$table->string('khang');
			$table->integer('ttien');
			$table->date('tghung');
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
        Schema::drop('dntungs');
    }
}
