<?php namespace MasonACM\Repositories\Forum;

use MasonACM\Repositories\Eloquent\EloquentRepository;
use MasonACM\Models\Thread;

class ThreadRepository extends EloquentRepository implements ThreadRepositoryInterface {

	/**
	 * @param Thread $thread
	 */
	public function __construct(Thread $thread)
	{
		$this->model = $thread;
	}

	/**
	 * Get all of the threads with Users that created them.
	 *
	 * @param  int $count
	 * @return \Paginator
	 */
	public function getAllPaginated($count)
	{
		return $this->model->with(['posts' => function($query)
		{
			$query->take(1)->with('user');

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

	/**
	 * @param type $id 
	 * @return type
	 */
	public function delete($id)
	{
		$thread = $this->getById($id);

		$thread->posts()->delete();

		return $thread->delete();
	}

}