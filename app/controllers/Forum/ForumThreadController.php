<?php

use MasonACM\Forms\ForumPostForm;
use MasonACM\Repositories\Forum\ForumRepositoryInterface;

class ForumThreadController extends \BaseController {

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
     * Displays a thread view
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $thread = $this->forumRepo->findThreadById($id);
        $posts = $this->forumRepo->paginatePosts($thread->id, 8);
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

        $thread = $this->forumRepo->createThread($input);

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