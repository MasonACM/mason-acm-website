<?php

use Illuminate\Database\Migrations\Migration;

class CreateSIGTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sig', function($table){
			$table->increments('id');
			$table->text('body');
			$table->string('url');
			$table->string('icon');
			$table->string('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sig');
	}

}