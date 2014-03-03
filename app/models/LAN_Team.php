<?php

// This model is for the teams in the gaming contests

class LAN_Team extends Eloquent
{
	protected $table = 'lan_teams';
	public $timestamps = false;

	public function players()
	{
		return $this->hasMany('LAN_Player', 'team_id')->get();
	}

	public function remove()
	{
		LanPlayer::where('team_id', $this->id)->team_id = 0;
		$this->delete();
	}

}