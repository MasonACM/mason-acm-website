<?php

use Illuminate\Database\Migrations\Migration;

class CreateLanGamesTable extends Migration {
	public function up()
	{
		Schema::create('lan_games', function($table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::dropIfExists('lan_games');
	}

}