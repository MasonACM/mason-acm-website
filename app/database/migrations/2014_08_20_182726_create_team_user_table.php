<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('competitors'))
		{
			Schema::create('competitors', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('team_id')->unsigned()->index();
				$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
				$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('competitors');
	}

}
