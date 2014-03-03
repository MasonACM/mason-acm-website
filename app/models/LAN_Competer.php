<?php


class LAN_Competer extends Eloquent
{
	protected $table = 'lan_competers';
	public $timestamps = false;

	public static function isPlayingGame($game_id)
	{
		return LanPlayer::where('game_id', $game_id)
						->where('user_id', Auth::user()->id)
						->count() > 0;
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}