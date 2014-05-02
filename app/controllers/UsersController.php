<?php

use MasonACM\Repositories\User\UserRepositoryInterface;
use MasonACM\Services\Validation\UserValidator;

class UsersController extends BaseController {
    
    /**
     * @var MasonACM\Repositores\User\UserRepository
     */ 
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    } 

    /*
     * Displays the login page
     * 
     * @return Response
     */
    public function getLogin() 
    {
        return View::make('users.login');
    }

    /**
     * Displays the register page
     * 
     * @return Response
     */ 
    public function getCreate() 
    {
        return View::make('users.register');
    }

    /**
     * Logs a user out
     * 
     * @return Response
     */ 
    public function getLogout() 
    {
        Auth::logout();

        return Redirect::to('users/login');
    }

    /**
     * Creates a new account
     * 
     * @return Response
     */
    public function postCreate() 
    {
        $input = Input::all();
        $validator = new UserValidator;

        if (!$validator->validate($input)) 
        {
            return Redirect::to('users/register')
                ->withErrors($validator->errors())
                ->withInput();   
        }

        $user = $this->user->register($input); 
        Auth::login($user); 

        return Redirect::home()
            ->with('message', 'Account created successfully!');
    }

    /**
     * Logs the user in
     *
     * @return Resonse
     */  
    public function postLogin() 
    {
        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) 
        {
            return Redirect::intended('/');
        } 

        return Redirect::to('users/login')
            ->with('auth_message', 'Incorrect email or password')
            ->withInput(); 
    }
}