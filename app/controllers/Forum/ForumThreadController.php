<?php

use MasonACM\Forms\ForumPostForm;
use MasonACM\Repositories\Forum\threadRepositoryInterface;

class ForumThreadController extends \BaseController {

    /**
     * @var threadRepositoryInterface
     */
    private $threadRepo;

    /**
     * @param $forumPostForm
     * @param $threadRepo
     */
    function __construct(ThreadRepositoryInterface $threadRepo)
    {
        $this->threadRepo = $threadRepo;
    }

    /**
     * Displays a thread view
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $thread = $this->threadRepo->getById($id);

        $posts = $this->threadRepo


        $thread = $this->threadRepo->findThreadById($id);
        $posts = $this->threadRepo->paginatePosts($thread->id, 8);
        $user = (Auth::check()) ? Auth::user() : false;
        $topic = $thread->topic;

        if ( ! $thread) App::abort(404);

        return View::make('forum.thread', compact('thread', 'topic', 'posts', 'user'));
    }

    /**
     * Display the thread creation page
     *
     * @param  int $topic_id
     * @return Response
     */
    public function create($topic_id)
    {
        return View::make('forum.createThread', compact('topic_id'));
    }

    /**
     * Create a new ForumThread
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $this->forumPostForm->validate($input);

        $thread = $this->threadRepo->createThread($input);

        return Redirect::to('forum/thread/' . $thread->id);
    }

    /**
     * Delete a ForumThread by its ID
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
	{
		$thread = ForumThread::findOrFail($id);

		if(!Auth::user()->isAdmin()) App::abort(404);

		$thread->delete();

		return Redirect::to('forum');
	}

}