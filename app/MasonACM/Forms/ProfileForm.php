<?php namespace MasonACM\Forms;

use Laracasts\Validation\FormValidator;

class ProfileForm extends FormValidator {

    /**
     * Validation for profile information
     *
     * @var array
     */
    protected $rules = [
        'firstname' => 'required|max:50|alpha_dash',
        'lastname'  => 'required|max:50|alpha_dash',
        'grad_year' => 'required|digits:4|numeric'
	];

}