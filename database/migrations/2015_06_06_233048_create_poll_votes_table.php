<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poll_votes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('answers_id')->unsigned();
			$table->foreign('answers_id')->references('id')->on('answers');
			$table->integer('users_id')->unsigned();
			$table->foreign('users_id')->references('id')->on('users');
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
		Schema::drop('poll_votes');
	}

}
