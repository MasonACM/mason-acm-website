<?php namespace MasonACM\Presenters;

trait PresentableTrait {

	/**
	 * View presenter instance
	 * 
	 * @var mixed
	 */ 
	protected $presenterInstance;

	/**
	 * Prepare a new or cached presenter instance
	 * 
	 * @return mixed 
	 */ 
	public function present()
	{
		if (!$this->presenterInstance)	
		{
			$this->presenterInstance = new $this->presenter($this);
		}

		return $this->presenterInstance;
	}	
}