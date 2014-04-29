<?php namespace MasonACM\Services\Validation;

abstract class Validator {

	/**
	 * @var the errors returned by the validator
	 */ 
	protected $errors;

	/**
	 * Validates data against $rules
	 * 
	 * @param  mixed[] $input 
	 * @return boolean
	 */
	public function validate($input)
	{
		$validator = \Validator::make($input, static::$rules);

		if ($validator->fails())
		{
			$this->errors = $validator->messages();

			return false;
		}

		return true;
	}

	/**
	 * Gets the validators errors
	 * 
	 * @return mixed[]
	 */ 
	public function errors()
	{
		return $this->errors;
	}
}