<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('users'))
		{
			Schema::create('users', function($table){
				$table->increments('id');
				$table->string('firstname', 50);
				$table->string('lastname', 50);
				$table->string('email', 50)->unique();
				$table->string('password', 64);
				$table->integer('grad_year');
				$table->integer('role')->default(0);
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
		Schema::dropIfExists('users');
	}

}