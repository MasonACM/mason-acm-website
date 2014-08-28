<?php namespace MasonACM\Models;

use MasonACM\Presenters\PresentableTrait;

class Post extends EloquentModel {

	use PresentableTrait;

	/**
	 * @var string
	 */
	protected $table = 'forum_posts';

	/**
	 * @var array
	 */
	protected $fillable = ['body', 'thread_id', 'user_id'];

	/**
	 * @var array
	 */
	protected static $rules = [
		'body'      => 'required|max:1000',
		'user_id'   => 'integer',
		'thread_id' => 'integer'
	];

	/**
	 * @var string
	 */
	protected $presenter = '\MasonACM\Presenters\PostPresenter';

	/**
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('MasonACM\Models\User');
	}

	/**
	 * @return Thread 
	 */
	public function thread()
	{
		return $this->belongsTo('MasonACM\Models\Thread');
	}

	/**
	 * Delete the post and possibly its thread
	 * 
	 * @return bool
	 */ 
	public function deleteWithThread()
	{
		$thread = $this->thread;

		// Get the id of the first post in the thread
		$firstPostId = $thread->posts()->first(['id'])->id;

		// If the the first post of the thread is being deleted,
		// then delete the thread and all of its posts
		if ($firstPostId == $this->id) $thread->deleteWithPosts();
		
		// Otherwise, simply delete the post
		else return $this->delete();
	}

}