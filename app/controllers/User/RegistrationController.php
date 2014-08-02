<?php

use MasonACM\Repositories\User\UserRepositoryInterface;
use MasonACM\Exceptions\ModelNotValidException;
use MasonACM\Models\User;

class RegistrationController extends BaseController {
    
    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Displays the registration page
     * 
     * @return Response
     */ 
    public function create()
    {
    	return View::make('users.register');
    }

    /**
     * Creates a new user
     * 
     * @return Response
     */
    public function store()
    {
    	$input = Input::all();

        try
        {
            $user = $this->userRepo->create($input);

            Auth::login($user);

            return Redirect::home()
                ->withFlashMessage('Account created successfully!');
        }
        catch (ModelNotValidException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->errors()); 
        }

    }

}
