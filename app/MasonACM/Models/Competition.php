<?php namespace MasonACM\Models;

use MasonACM\Presenters\PresentableTrait;

class Competition extends EloquentModel {

	use PresentableTrait;

	/**
	 * @var string
	 */
	protected $table = 'competitions';

	/**
	 * @var array
	 */
	protected $fillable = ['game_title', 'max_players', 'lanparty_id'];

	/**
	 * @var string
	 */
	protected $presenter = 'MasonACM\Presenters\CompetitionPresenter';

	/**
	 * @var array
	 */
	protected static $rules = [
		'game_title'  => 'min:3|max:50',
		'max_players' => 'numeric',
		'lanparty_id' => 'numeric'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function teams()
	{
		return $this->hasMany('MasonACM\Models\Team');
	}

	/**
	 * @return bool
	 */
	public function isTeamBased()
	{
		return $this->max_players > 1;
	}

	/**
	 * Determine if the logged in user is signed up for a competition
	 * 
	 * @return bool
	 */ 
	public function check()
	{
		foreach ($this->teams as $team)
		{
			if ($team->competitor->user_id == \Auth::id()) return true;
		}

		return false;
	}

}
