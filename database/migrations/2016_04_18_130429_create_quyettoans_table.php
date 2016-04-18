<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyettoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyettoans', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('dntung_id');
			$table->text('ldo');
			$table->integer('stclai');
			$table->string('hdon');
			$table->date('nchi');
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
        Schema::drop('quyettoans');
    }
}
