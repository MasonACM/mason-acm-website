<?php

class AdminController extends \BaseController  {
	
    public function getIndex()
	{
		return View::make('admin.dashboard');
    }

    public function getUsers()
    {
    	$users = User::paginate(30);

        return View::make('admin.users', compact('users'));
    }

}
