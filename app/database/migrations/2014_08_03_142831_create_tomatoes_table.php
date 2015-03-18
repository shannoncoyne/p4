<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTomatoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tomatoes', function($t) {
			$t->integer('user_id')->unsigned();
			$t->string('title', 400);
			$t->increments('id');
			$t->integer('length')->unsigned();
			$t->integer('break_duration')->unsigned();
			$t->integer('set_max')->unsigned();
			$t->timestamps();
			
			$t->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tomatoes');
	}

}
