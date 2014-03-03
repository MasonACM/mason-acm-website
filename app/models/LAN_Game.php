<?php

// This model is for the games at the Lan Party in the main contests

class LanGame extends Eloquent
{
	protected $table = 'lan_games';
	protected $guarded = array('id');
	
	public $timestamps = false;

	public function players()
	{
		return $this->hasMany('LanPlayer', 'game_id')->get();
	}

	public function teams()
	{
		return $this->hasMany('LanTeam', 'game_id')->get();		
	}
}

