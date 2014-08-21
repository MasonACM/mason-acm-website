<?php namespace MasonACM\Models;

class Competitor extends EloquentModel {

	/**
	 * @var string
	 */ 
	protected $table = 'competitors';

	/**
	 * @var string
	 */ 
	protected $fillable = ['user_id', 'team_id'];

	/**
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('user');
	}

	/**
	 * @return Team
	 */ 
	public function team()
	{
		return $this->belongsTo('team');
	}

}
