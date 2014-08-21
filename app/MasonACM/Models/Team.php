<?php namespace MasonACM\Models;

class Team extends EloquentModel {

	/**
	 * @var string 
	 */ 
	protected $table = 'teams';

	/**
	 * @var array
	 */ 
	protected $fillable = ['name', 'lanparty_id', 'game_id'];

	/**
	 * @var array
	 */
	protected static $rules = [
		'name'    => 'min:2|max:50',
		'game_id' => 'numeric'
	];

	/**
	 * @return BelongsTo
	 */ 
	public function party()
	{
		return $this->belongsTo('MasonACM\Models\LanParty');
	}

	/**
	 * @return BelongsTo
	 */ 
	public function game()
	{
		return $this->belongsTo('MasonACM\Models\Game');
	}

	/**
	 * @return BelongsTo
	 */ 
	public function competitors()
	{
		return $this->hasMany('MasonACM\Models\Competitors');
	}

	/**
	 * @return boolean
	 */ 
	public function isFull()
	{
		return $this->competitors()->count() >= $this->game->max_players;
	}

}