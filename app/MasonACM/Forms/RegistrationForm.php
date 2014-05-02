<?php namespace MasonACM\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

	/**
	 * Validation rules for creating an account
	 * 
	 * @var array
	 */ 
	protected $rules = [
		'email'     => 'required|email|unique:users',
		'firstname' => 'required|min:2|max:50|alpha_dash',
		'lastname'  => 'required|min:2|max:50|alpha_dash',
		'grad_year' => 'required|number|digits:4',
		'password'  => 'required|confirmed'
	];

}