<?php

use MasonACM\Repositories\User\UserRepositoryInterface;
use MasonACM\Exceptions\ModelNotValidException;
use MasonACM\Models\User;

class UserController extends BaseController {
    
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
     * @return Response
     */ 
    public function index()
    {
		if ( ! Request::wantsJson()) return View::make('users.index');

        $input = Input::all();

        $users = $this->userRepo->getAllSorted(
            $input['count'], $input['sortBy'], $input['sortOrder']
        );

        return $users;
    }

    /**
     * @return Response
     */ 
    public function create()
    {
    	return View::make('users.register');
    }

    /**
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

    /**
     * @return Response
     */ 
    public function edit()
    {
        $user = Auth::user();

        return View::make('users.profile', compact('user'));
    }

    /**
     * @return Response
     */ 
    public function update()
    {
		try
		{
        	$id = Auth::id();

        	$this->userRepo->update($id, Input::all());

        	return Redirect::back()->withFlashMessage('Profile updated!');
		}
		catch (ModelNotValidException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->errors());
		}

    }

}
