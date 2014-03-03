<?php

use Illuminate\Database\Migrations\Migration;

class CreateThreadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_threads', function($table){
			$table->increments('id');
			$table->string('title');
			$table->integer('topic_id');
			$table->integer('author_id');	
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
		Schema::dropIfExists('forum_threads');
	}

}