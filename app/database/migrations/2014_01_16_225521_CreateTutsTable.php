<?php

use Illuminate\Database\Migrations\Migration;

class CreateTutsTable extends Migration {

	public function up()
	{
		if ( ! Schema::hasTable('tuts'))
		{
			Schema::create('tuts', function($table){
				$table->increments('id');
				$table->integer('tut_topic_id');
				$table->integer('author_id');
				$table->string('title', 50);
				$table->text('body');	
				$table->timestamps();
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('tuts');	
	}

}