<?php namespace MasonACM\Repositories\Forum;

use MasonACM\Repositories\Eloquent\EloquentRepository;
use MasonACM\Models\Post;

class PostRepository extends EloquentRepository implements PostRepositoryInterface {

	/**
	 * @param Post $post
	 */
	public function __construct(Post $post)
	{
		$this->model = $post;
	}

	/**
	 * @param  int $id 
	 * @return bool
	 */
	public function delete($id)
	{
		$post = $this->getById($id);

		$thread = $post->thread;

		$posts = $thread->posts();

		// If the first post is being deleted,
		// then delete the whole thread
		if ($posts->first()->id == $id)
		{
			$thread->delete();

			return $posts->delete();
		}
		
		return $post->delete();
	}

}
