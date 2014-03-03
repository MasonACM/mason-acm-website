<?php

use Illuminate\Database\Migrations\Migration;

class CreateLanPartyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lan_partys', function($table){
			$table->increments('id');
			$table->dateTime('date');
			$table->string('pic_path');	
			$table->boolean('active');
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
		Schema::dropIfExists('lan_partys');
	}

}