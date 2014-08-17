<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropTutTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('tut_topics'))
		{
			Schema::drop('tut_topics');
		}
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('tut_topics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
		});
	}

}
