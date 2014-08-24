<?php

use MasonACM\Repositories\Forum\PostRepositoryInterface;
use MasonACM\Exceptions\ModelNotValidException;

class PostController extends \BaseController {

	/**
	 * @var ThreadRepositoryInterface
	 */
	private $postRepo;

	/**
	 * @param ThreadRepositoryInterface $threadRepo
	 */
	public function __construct(PostRepositoryInterface $postRepo)
	{
		$this->postRepo = $postRepo;
	}

	/**
	 * Store a newly created Post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$input['user_id'] = Auth::user()->id;

		try
		{
			$this->postRepo->create($input);

			return Redirect::back();
		}
		catch (ModelNotValidException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->errors());
		}
	}

	/**
	 * Remove the specified Post from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->postRepo->delete($id);

		return Redirect::back()->withFlashMessage('Post successfully deleted!');
	}

}
