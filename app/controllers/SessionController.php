<?php

use MasonACM\Forms\LoginForm;

class SessionController extends BaseController {

    /**
     * @var LoginForm
     */
    private $loginForm;

    /**
     * Constructs the SessionController
     *
     * @param LoginForm $loginForm
     */
    function __construct(LoginForm $loginForm)
    {
        $this->loginForm = $loginForm;
    }

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
	 * Logs a user in
	 * 
	 * @return Response
	 */ 
	public function store()
	{
		if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
        {
            return Redirect::intended('/');
        } 

        return Redirect::to('users/login')
            ->with('auth_message', 'Incorrect email or password')
            ->withInput();
    }

	/**
	 * Logs a user out
	 * 
	 * @return Response 
	 */ 
	public function destroy()
	{
		Auth::logout();

		return Redirect::intended('/');
	}
}