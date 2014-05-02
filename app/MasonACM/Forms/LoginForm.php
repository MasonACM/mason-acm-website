<?php namespace MasonACM\Forms;

use Laracasts\Validation\FormValidator;

class LoginForm extends FormValidator {

	protected $rules = [
		'email' => 'email|required',
		'password' => 'required'
	];

}