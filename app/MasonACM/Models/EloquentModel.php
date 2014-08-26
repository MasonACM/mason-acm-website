<?php namespace MasonACM\Models;

use MasonACM\Exceptions\ModelNotValidException;
use Eloquent, Validator;

abstract class EloquentModel extends Eloquent {

	/**
	 * @var array
	 */
	protected static $rules;

	/**
	 * @param  array $attributes
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
