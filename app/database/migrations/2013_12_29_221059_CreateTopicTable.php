<?php

use Illuminate\Database\Migrations\Migration;

class CreateTopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('forum_topics'))
		{
			Schema::create('forum_topics', function($table){
				$table->increments('id');
				$table->string('name');
				$table->string('description');	
				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('forum_topics');
	}

}