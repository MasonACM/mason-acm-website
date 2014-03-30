<?php


class AdminController extends \BaseController  {
	
    public function getIndex()
	{
		return View::make('admin.dashboard');
    }

    public function getUsers()
    {
        return View::make('');
    }

}
