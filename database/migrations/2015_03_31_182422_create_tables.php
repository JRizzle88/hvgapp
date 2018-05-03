<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Users Table
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			//general
			$table->string('player_name')->unique();
			$table->string('email')->unique();
			$table->string('role', 50)->default('player');
			$table->string('password', 255);
			$table->string('first_name', 255)->nullable();
			$table->string('last_name', 255)->nullable();
      		$table->string('city', 255)->nullable();
      		$table->string('state', 255)->nullable();
      		$table->string('phone', 12)->nullable();
			//social
			$table->string('steam')->nullable();
			$table->string('twitch')->nullable();
			$table->string('origin')->nullable();
			$table->string('linkedin')->nullable();
			$table->string('twitter')->nullable();
			$table->string('facebook')->nullable();
			$table->string('googleplus')->nullable();
			$table->string('skype')->nullable();
			$table->string('github')->nullable();

			//hardware
			$table->string('player_cpu')->nullable();
			$table->string('player_ram')->nullable();
			$table->string('player_video_card')->nullable();
			$table->string('player_monitor')->nullable();

      		// other accessories?
			$table->text('player_periphials')->nullable();
      		$table->text('player_mobile_devices')->nullable();

      		// Random information
      		$table->text('favorite_sites')->nullable();

			// points and other system models
			$table->boolean('valid_license')->default(0);
      		$table->integer('points')->nullable();
			$table->boolean('online');
			$table->datetime('last_login');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
		
		// Create Posts Table
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('name');
			$table->text('content');
			$table->string('featured_image');
			$table->string('slug')->nullable();
			$table->string('seo_title');
			$table->string('seo_description');
			$table->string('seo_keywords');
			$table->boolean('draft')->default(false);
			$table->timestamps();
			$table->softDeletes();
		});
		
		// Create Comments Table
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('post_id')->unsigned()->default(0);
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')->references('id')->on('users');
			$table->text('content');
			$table->integer('likes')->nullable()->default(0);
			$table->integer('dislikes')->nullable()->default(0);
			$table->timestamps();
			$table->softDeletes();
		});

		// Create Pages Table
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('name');
			$table->text('content');
			$table->string('slug')->nullable();
			$table->string('seo_title');
			$table->string('seo_description');
			$table->string('seo_keywords');
			$table->boolean('draft')->default(false);
			$table->timestamps();
			$table->softDeletes();
		});
		
		// Create Sessions Table
		Schema::create('sessions', function(Blueprint $table) {
			$table->string('id')->unique();
			$table->text('payload');
			$table->integer('last_activity');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')->references('id')->on('users');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop pages table
		Schema::drop('pages');
		// drop posts table
		Schema::drop('posts');
		// drop comments table
		Schema::drop('comments');
		// drop sessions table
		Schema::drop('sessions');
		
		// drop users table - STAYS LAST
		Schema::drop('users');
	}

}
