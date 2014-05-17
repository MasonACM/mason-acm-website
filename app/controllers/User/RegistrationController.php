<?php

use MasonACM\Repositories\User\UserRepositoryInterface;
use MasonACM\Forms\RegistrationForm;

class RegistrationController extends BaseController {
    
    /**
     * @var UserRepositoryInterface
     */ 
    private $userRepo;

    /**
     * @var RegistrationForm
     */ 
    private $registrationForm;

    /**
     * Creates the RegistraionRepository
     *
     * @param UserRepositoryInterface $userRepo
     * @param MasonACM\Forms\RegistrationForm $registrationForm
     */
    public function __construct(UserRepositoryInterface $userRepo, RegistrationForm $registrationForm)
    {
        $this->userRepo = $userRepo;
        $this->registrationForm = $registrationForm;
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

        $this->registrationForm->validate($input);

        $user = $this->userRepo->register($input);

        Auth::login($user);

        return Redirect::home()
            ->withFlashMessage('Account created successfully!');
    }
}