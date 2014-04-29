<?php namespace MasonACM\Presenters;

abstract class Presenter {

	protected $model;

	function __construct($model)
	{
		$this->model = $model;
	}

	public function __get($property)
	{
		if (method_exists($this, $property))
		{
			return $this->{$property}();
		}
		return $this->model->{$property};
	}
}