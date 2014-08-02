<?php namespace MasonACM\Exceptions;

class ModelNotValidException extends \Exception {

	/**
	 * @var array
	 */
	private $errors;

	/**
	 * @param string $message
	 * @param \Illuminate\Support\MessageBag $errors
	 */
	public function __construct($message, $errors)
	{
		$this->errors = $errors;

		parent::__construct($message);
	}

	/**
	 * @return array
	 */
	public function errors()
	{
		return $this->errors;
	}

}
