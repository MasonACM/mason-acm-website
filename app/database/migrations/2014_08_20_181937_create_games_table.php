<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('games'))
		{
			Schema::create('games', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('title');
				$table->unsignedInteger('lanparty_id');
				$table->unsignedInteger('max_players')->nullable();
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
		Schema::drop('games');
	}

}
