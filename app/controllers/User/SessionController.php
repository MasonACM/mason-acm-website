<?php

use MasonACM\Repositories\User\UserRepositoryInterface;

class SessionController extends BaseController {

    /**
     * @var UserRepositoryInterface
     */ 
    private $userRepo;

    /**
     * Creates the RegistraionRepository
     *
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
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
		if ($user = $this->userRepo->attemptLogin(Input::all()))
        {
        	Auth::login($user);

            return Redirect::intended('/');
        }

        return Redirect::to('login')
            ->withAuthMessage('Incorrect email or password')
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
