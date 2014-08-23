<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('teams'))
		{
			Schema::create('teams', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('name');
				$table->unsignedInteger('lanparty_id');
				$table->unsignedInteger('game_id');
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
		Schema::drop('teams');
	}

}
