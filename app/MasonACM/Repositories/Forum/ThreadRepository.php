<?php namespace MasonACM\Repositories\Forum;

use MasonACM\Repositories\Eloquent\EloquentRepository;
use MasonACM\Models\Thread;

class ThreadRepository extends EloquentRepository implements ThreadRepositoryInterface {

	/**
	 * @var PostRepositoryInterface
	 */
	private $postRepo;

	/**
	 * @param Thread $thread
	 */
	public function __construct(Thread $thread, PostRepositoryInterface $postRepo)
	{
		$this->model = $thread;
		$this->postRepo = $postRepo;
	}

	/**
	 * @param  type $input 
	 * @return Thread
	 */
	public function create($input)
	{
		$threadInput = array_only($input, ['title']);

		$postInput = array_only($input, ['body', 'user_id']);

		$thread = parent::create($threadInput);

		$postInput['thread_id'] = $thread->id;

		$this->postRepo->create($postInput);

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
		return $this->model->with(['posts' => function($query)
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