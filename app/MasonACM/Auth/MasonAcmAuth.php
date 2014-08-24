<?php namespace MasonACM\Auth;

use Illuminate\Auth\Guard;
use Illuminate\Hashing\BcryptHasher;
use MasonACM\Auth\MasonAcmAuthProvider as AuthProvider;
use App, Config;

class MasonAcmAuth extends Guard {

	/**
	 * Construct the parent with the custom provider
	 */ 
	public function __construct()
	{
		parent::__construct(
	        new AuthProvider (
	            new BcryptHasher,
	            Config::get('auth.model')
	        ),
	        App::make('session.store')
		);
	}

	/**
	 * @return bool
	 */ 
	public function admin()
	{
		return $this->check() && $this->user()->isAdmin();
	}

}