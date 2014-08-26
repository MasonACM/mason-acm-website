<?php namespace MasonACM\Models;

use MasonACM\Exceptions\ModelNotValidException;
use Eloquent, Validator;

abstract class EloquentModel extends Eloquent {

	/**
	 * @var array
	 */
	protected static $rules;

	/**
	 * @var array
	 */ 
	protected static $sanitizers;

	/**
	 * @param  array $attributes
	 * @param  array $except
	 * @throws ModelNotValidException
	 * @return void
	 */
	public static function validate(array $attributes, $except = [])
	{
		$validator = Validator::make(
			$attributes, array_except(static::$rules, $except)
		);

		if ($validator->fails())
		{
			throw new ModelNotValidException('The model is not valid.', $validator->errors());
		}
	}

	/**
	 * @param  array $input
	 * @param  array $except
	 * @return void
	 */
	public static function sanitize(array $attributes, $except = [])
	{
		foreach (array_except(static::$sanitizers, $except) as $attribute => $sanitizer)
		{
			foreach (explode('|', $sanitizer) as $function)
			{
				$attributes[$attribute] = call_user_func($function, $attributes[$attribute]);
			}
		}

		return $attributes;
	}

	/**
	 * @param array $attributes
	 * @throws \MasonACM\Exceptions\ModelNotValidException
	 * @return Eloquent
	 */
	public static function createAndValidate(array $attributes)
	{
		static::validate($attributes);

		return parent::create($attributes);
	}


	/**
	 * @param  array $attributes
	 * @throws ModelNotValidException
	 * @return $this
	 */
	public function updateAndValidate(array $attributes)
	{
		static::validate($attributes);

		$model = parent::fill($attributes);

		$model->save();

		return $model;
	}

}
