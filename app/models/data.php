<?php

class data extends Eloquent
{
	public static function isAttendingLan() 
	{
		return (LanRoster::where('user_id', Auth::user()->id)->count() > 0);
	}

	public static function isPlayingGame($game_id)
	{
		return (LanPlayer::where('game_id', $game_id)
						->where('user_id', Auth::user()->id)
						->count() > 0);
	}

	public static function doesTeamExist($teamName)
	{
		return (LanTeam::where('name', $teamName)->count() > 0);
	}

	public static function getTeamsByGame($game_id) {
		return LanTeam::where('game_id', $game_id)->get();
	}

	public static function getTeamCount($team_id) {
		return LanPlayer::where('team_id', $team_id)->count();
	}

	public static function isOnTeam($team_id) {
		return LanPlayer::where('team_id', $team_id)
						->where('user_id', Auth::user()->id)->count() > 0;
	}

}