<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropLanGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('lan_games'))
		{
			Schema::drop('lan_games');
		}
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('lan_games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
		});
	}

}
