<?php

use Illuminate\Database\Migrations\Migration;

class CreateLanTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lan_teams', function($table){
			$table->increments('id');
			$table->string('name');
			$table->integer('game_id');
			$table->integer('user_id');	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('lan_teams');
	}

}