<?php namespace MasonACM\Models;

use Auth;

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
	 * @var array
	 */
	protected static $rules = [
		'team_id' => 'numeric',
		'user_id' => 'sometimes|numeric'
	];

	/**
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('MasonACM\Models\User');
	}

	/**
	 * @return Team
	 */ 
	public function team()
	{
		return $this->belongsTo('MasonACM\Models\Team');
	}

}
