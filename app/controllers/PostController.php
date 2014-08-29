<?php

use MasonACM\Models\Post;
use MasonACM\Exceptions\ModelNotValidException;

class PostController extends \BaseController {

	/**
	 * @var Post 
	 */
	private $post;

	/**
	 * @param Post $post
	 */
	public function __construct(Post $post)
	{
		$this->post = $post;
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
			$this->post->createAndValidate($input);

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
		$this->post->find($id)->deleteWithThread();

		return Redirect::back()->withFlashMessage('Post successfully deleted!');
	}

}
