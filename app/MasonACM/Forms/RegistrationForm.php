<?php namespace MasonACM\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

    /**
     * Validation rules when a user registers
     *
     * @var array
     */
    protected $rules = [
		'email'     => 'email|required|max:50',
		'password'  => 'required|confirmed|min:6',
        'firstname' => 'required|max:50|alpha_dash',
        'lastname'  => 'required|max:50|alpha_dash',
        'grad_year' => 'required|digits:4|numeric'

	];

}