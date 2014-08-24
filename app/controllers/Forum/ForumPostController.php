<?php

use MasonACM\Forms\ForumPostForm;
use MasonACM\Repositories\Forum\ForumRepositoryInterface;

class ForumPostController extends \BaseController {


    /**
     * @var ForumRepositoryInterface
     */
    private $forumRepo;

    /**
     * @var ForumPostForm
     */
    private $forumPostForm;

    /**
     * Create the ForumPostController
     *
     * @param $forumPostForm
     * @param $forumRepo
     */
    function __construct(ForumPostForm $forumPostForm, ForumRepositoryInterface $forumRepo)
    {
        $this->forumPostForm = $forumPostForm;
        $this->forumRepo = $forumRepo;
    }

    /**
     * Create a new forum post
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $this->forumPostForm->validate($input);

        $post = $this->forumRepo->createPost($input);

        return Redirect::to('forum/thread/' . $post->thread_id);
    }

	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}

    /**
     * Delete the post by its ID
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
	{
		$post = $this->forumRepo->findPostById($id);

		if ( ! $post->canBeDeletedByLoggedInUser()) App::abort(404);

        $this->forumRepo->deletePost($id);

		return Redirect::to('forum/thread/' . $post->thread->id);
	}

}