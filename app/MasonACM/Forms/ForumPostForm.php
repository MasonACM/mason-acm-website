<?php namespace MasonACM\Forms;

use Laracasts\Validation\FormValidator;

class ForumPostForm extends FormValidator {

    protected $rules = [
        'body' => 'required|max:300'
    ];

}