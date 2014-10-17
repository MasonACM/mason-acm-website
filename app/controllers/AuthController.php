<?php

class AuthController extends \BaseController {

    /**
	 * Displays the login page
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return View::make('users.login');
	}

	/**
	 * Login the user.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		$input = Input::all();

		if (Auth::attempt(array_only($input, ['email', 'password']), true))
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
	public function logout()
	{
		Auth::logout();

		return Redirect::intended('/');
	}
}
