<?php

use Illuminate\Database\Migrations\Migration;

class CreateStaticContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_content', function($table){
			$table->increments('id');
			$table->timestamps();
			$table->string('content');
			$table->string('url');
			$table->string('title');
			$table->integer('author_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('static_content');
	}

}