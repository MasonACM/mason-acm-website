<?php

class LanTeamController extends BaseController 
{
	protected $layout = "layouts.master";

	public function getIndex() 
	{
		$this->layout->title = "Join or Create a team for all the game(s) below";
		$this->layout->content = View::make('lanparty.teams');
	}

	public function postCreate($gameid)
	{
		$teamName = Input::get('teamName');

		if (!data::doesTeamExist($teamName)) {
			$team = new LanTeam();
			$team->name = $teamName;
			$team->game_id = $gameid;
			$team->creator_id = Auth::user()->id;

			$team->save();	
			return Redirect::to('lanteam');
		} 
		else {
			return Redirect::to('lanteam')->with('message', 'Team name already exists');
		}
	}

	public function getJoin($team_id, $game_id) 
	{
		LanPlayer::where('user_id', Auth::user()->id)
				  ->where('game_id', $game_id)
            	  ->update(array('team_id' => $team_id));

        return Redirect::to('lanteam');
	}

	public function postRemoveteam()
	{
		$team_id = Input::get('team_id');
		LanTeam::findOrFail($team_id)->remove();

		return Redirect::to('lanteam');
	}

}