<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanAttendeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lan_attendees', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('lanparty_id');
			$table->string('firstname', 50);
			$table->string('lastname', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('lan_attendees');
	}
}
