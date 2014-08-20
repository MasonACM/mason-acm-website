<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAuthorIdColumnInPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forum_posts', function(Blueprint $table)
		{
			$table->renameColumn('author_id', 'user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('forum_posts', function(Blueprint $table)
		{
			$table->renameColumn('user_id', 'author_id');
		});
	}

}
