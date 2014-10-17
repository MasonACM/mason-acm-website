<?php namespace MasonACM\Repositories;

use MasonACM\Models\Post;
use MasonACM\Models\Thread;

class ThreadRepository {

	/**
	 * @var Thread 
	 */
	private $thread;

	/**
	 * @var Post 
	 */ 
	private $post;

	/**
	 * @param Thread $thread
	 * @param Post $post
	 */
	public function __construct(Thread $thread, Post $post)
	{
		$this->thread = $thread;
		$this->post = $post;
	}

	/**
	 * @param  type $input 
	 * @return Thread
	 */
	public function create($input)
	{
		$thread = $this->thread->createAndValidate($input);

		$input['thread_id'] = $thread->id;

		$this->post->createAndValidate($input);

		return $thread;
	}

	/**
	 * Get all of the threads with Users that created them.
	 *
	 * @param  int $count
	 * @return \Paginator
	 */
	public function getAllPaginated($count)
	{
		return $this->thread->with(['posts' => function($query)
		{
			$query->with('user');

		}])->paginate(8);
	}

	/**
	 * Get all the posts for the specified thread, paginated.
	 *
	 * @param  int $id 
	 * @param  int $count 
	 * @return \Paginator
	 */
	public function getPostsPaginated($thread, $count)
	{
		return $thread->posts()->with('user')->paginate($count);
	}

}
