<?php

use MasonACM\Models\User;
use MasonACM\Repositories\UserRepository;
use MasonACM\Exceptions\ModelNotValidException;

class UserController extends \BaseController {
    
    /**
     * @var User
     */
    private $user;

    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * @param UserRepository $userRepo
     */
    public function __construct(UserRepository $userRepo, User $user)
    {
        $this->userRepo = $userRepo;
        $this->user = $user;
    }

    /**
     * @return Response
     */ 
    public function index()
    {
		if ( ! Request::wantsJson()) return View::make('users.index');

        $input = Input::all();

        $input = array_merge([
            'count' => 8,'sortBy' => 'id', 'sortOrder' => 'asc'
        ], $input);

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
            $user = $this->user->createAndValidate($input);

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

        	$this->user->find($id)->fill(Input::all())->save();

        	return Redirect::back()->withFlashMessage('Profile updated!');
		}
		catch (ModelNotValidException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->errors());
		}

    }

}
