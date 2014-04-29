<?php namespace MasonACM\Repositories\User;

use User;
use Hash;

class UserRepository implements UserRepositoryInterface {

	/**
	 * Creates and returns a new user
	 * 
	 * @param mixed[] $input Fields required to create a user
	 * @return User 
	 */ 
	public function register($input)
	{
	    $user = new User;
	   	$user->fill($input);	 
	    $user->password = Hash::make($input['password']); 
	    $user->role = 0; 
	    $user->save();

	    return $user;
	}

}