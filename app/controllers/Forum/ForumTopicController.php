<?php

use MasonACM\Forms\ForumPostForm;
use MasonACM\Repositories\Forum\ForumRepositoryInterface;

class ForumTopicController extends \BaseController {

    /**
     * @var ForumRepositoryInterface
     */
    private $forumRepo;

    /**
     * Create the ForumPostController
     *
     * @param $forumRepo
     */
    function __construct(ForumRepositoryInterface $forumRepo)
    {
        $this->forumRepo = $forumRepo;
    }

    /**
     * Display the main forum page
     *
     * @return Response
     */
    public function index()
    {
        return View::make('forum.index');
    }

    /**
     * Display the topic view
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $topic = $this->forumRepo->findTopicById($id);
        $threads = $this->forumRepo->paginateThreads($id, 8);

        return View::make('forum.topic', compact('topic', 'threads'));
    }

    /**
     * Display the topic creation view
     *
     * @return Response
     */
    public function create()
    {
        return View::make('forum.createTopic');
    }

    /**
     * Create a new topic
     *
     * @return Response
     */
    public function store()
    {
        $this->forumRepo->createTopic(Input::all());

        return Redirect::to('forum');
    }

    /**
     * Delete a specified topic
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->forumRepo->deleteTopic($id);

        return Redirect::to('forum');
    }
}