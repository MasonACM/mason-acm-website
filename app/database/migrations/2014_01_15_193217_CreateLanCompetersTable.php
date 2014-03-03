<?php

use Illuminate\Database\Migrations\Migration;

class CreateLanCompetersTable extends Migration {
	public function up()
	{
		Schema::create('lan_competers', function($table){
			$table->increments('id');
			$table->integer('game_id');
			$table->integer('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('lan_competers');
	}

}