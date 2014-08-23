<?php namespace MasonACM\Models;

use MasonACM\Presenters\PresentableTrait;

class Game extends EloquentModel {

	use PresentableTrait;

	/**
	 * @var string 
	 */ 
	protected $table = 'games';

	/**
	 * @var array
	 */ 
	protected $fillable = ['title', 'lanparty_id', 'max_players'];

	/**
	 * @var array
	 */ 
	protected static $rules = [
		'title' => 'required'
	];

	/**
	 * @var string
	 */ 
	protected $presenter = 'MasonACM\Presenters\GamePresenter';

	/**
	 * @return BelongsTo
	 */ 
	public function party()
	{
		return $this->belongsTo('MasonACM\Models\LanParty', 'lanparty_id');
	}

	/**
	 * @return BelongsTo
	 */ 
	public function teams()
	{
		return $this->hasMany('MasonACM\Models\Team');
	}

	/**
	 * @return Game
	 */ 
	public static function getActiveGames()
	{
		$activePartyId = LanParty::getActiveParty()->id;

		return static::where('lanparty_id', $activePartyId)->get();
	}

	/**
	 * @return bool
	 */ 
	public function isTeamBased()
	{
		return $this->max_players > 1;
	}

	/**
	 * @return int
	 */ 
	public function playerCount()
	{
		return $this->teams()->count();
	}
}