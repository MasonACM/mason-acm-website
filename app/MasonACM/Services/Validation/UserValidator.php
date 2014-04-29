<?php namespace MasonACM\Services\Validation;

class UserValidator extends Validator {

	/**
	 * @var the rules used to validate the user data
	 */ 
	static $rules = [
        'firstname' => 'required|alpha|min:2',
        'lastname'  => 'required|alpha|min:2',
        'email'     => 'required|email|unique:users',
        'grad_year' => 'required|integer',
        'password'  => 'required|alpha_num|between:6,20|confirmed',
    ];
}