<?php namespace MasonACM\Composers;

use MasonACM\Models\LanParty;

class BaseComposer {

	/**
	 * @var bool
	 */ 
	protected static $activeLanParty;

	/**
	 * @param string $view 
	 */
	public function compose($view)
	{
		if ( ! isset(static::$activeLanParty))	
		{
			static::$activeLanParty = LanParty::hasActiveParty();
		}

		$view->with([
			'activeLanParty' => static::$activeLanParty
		]);
	}

}