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
		if ( ! Schema::hasTable('lan_parties'))
		{
			Schema::create('lan_parties', function($table){
				$table->increments('id');
				$table->date('date');
				$table->boolean('active');
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
		Schema::dropIfExists('lan_parties');
	}

}