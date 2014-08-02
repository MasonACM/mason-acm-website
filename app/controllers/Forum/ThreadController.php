<?php

use MasonACM\Repositories\Forum\ThreadRepositoryInterface;

class ThreadController extends BaseController {

	/**
	 * @var ThreadRepositoryInterface
	 */
	private $threadRepo;

	/**
	 * @param ThreadRepositoryInterface $threadRepo
	 */
	public function __construct(ThreadRepositoryInterface $threadRepo)
	{
		$this->threadRepo = $threadRepo;
	}

	/**
	 * Display the main forum page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$threads = $this->threadRepo->getAllPaginated(8);

		return View::make('forum.index')->withThreads($threads);
	}

	/**
	 * Display the Thread creation page.
	 *
	 * @return Response
	 */
	public function create()
	{
	
	}

	/**
	 * Store a newly created Thread in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the single Thread page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$thread = $this->threadRepo->getById($id);

		$posts = $this->threadRepo->getPostsPaginated($thread, 5);

		return View::make('forum.thread')->withPosts($posts)->withThread($thread);
	}

	/**
	 * Remove the specified Thread from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->threadRepo->destroy($id);
	}

}
