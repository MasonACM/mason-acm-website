<?php

use MasonACM\Repositories\User\UserRepositoryInterface;

class SessionController extends BaseController {

    /**
	 * Displays the login page
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.login');
	}

	/**
	 * Login the user.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if (Auth::attempt(array_only($input, ['email', 'password'])))
        {
            return Redirect::intended();
        }

        return Redirect::to('login')
            ->withAuthMessage('Incorrect email or password')
            ->withInput();
    }

	/**
	 * Logout the user.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::intended('/');
	}
}
