<?php

use MasonACM\Repositories\UserRepository;

class AdminController extends \BaseController  {

    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * @param UserRepository
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
	
    /**
     * @return Response
     */
    public function getIndex()
	{
		return View::make('admin.index');
    }

    /**
     * @return Response
     */ 
    public function getMembers()
    {
        $members = $this->userRepo->getAllMembers();

        return View::make('admin.members', compact('members'));
    }

}
