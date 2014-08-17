<?php

use Illuminate\Database\Migrations\Migration;

class CreateTutTopicsTable extends Migration {

	public function up()
	{
		if ( ! Schema::hasTable('tut_topics'))
		{
			Schema::create('tut_topics', function($table){
				$table->increments('id');
				$table->text('name');
				$table->string('pic_path');	
				$table->timestamps();
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('tut_topics');	
	}
}