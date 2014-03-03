<?php

class SuperAdminController extends BaseController  {
	protected $layout = 'layouts.master';

	public function getIndex() 
	{
		$this->layout->title = 'Super Admin Panel';
		$this->layout->content = View::make('superadmin.panel');
	}	

	public function getAccounts() 
	{
		$users = array();
		
		foreach (User::all() as $user) {
			array_push($users, $user);
		}

		$this->layout->title = 'Users';
		$this->layout->content = View::make('superadmin.users')->with('users', $users);
	}
}