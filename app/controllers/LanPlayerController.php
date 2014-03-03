<?php

class LanPlayerController extends BaseController 
{
	protected $layout = "layouts.master";

	public function getSignup() 
	{
		if (Auth::check()) {	
			
			// This array will be used to check any boxes previously checked.
			$preInput = array();
			$isAttendingLan = data::isAttendingLan();
		
			if ($isAttendingLan == false) array_push($preInput, false);
			else array_push($preInput, true);
			
			foreach(LanGame::all() as $game) {
				$isInContest = LanPlayer::where('user_id', Auth::user()->id)->where('game_id', $game->id);

				if ($isInContest->count() == 0) array_push($preInput, false);
				else array_push($preInput, true);	
			}
	
			$this->layout->title = "Sign up for the <a href='../sig/lanparty'>LAN Party</a>";
       	 	$this->layout->content = "<div class='article'>" . View::make('lanparty.signup')->with('preInput', $preInput) . "</div>";
       	}
       	else {
       		$this->layout->title = "You are not logged in";
       		$this->layout->content = View::make('users.notloggedin');
       	}
	}

	public function postUpdate() 
	{
		$LanAttender = new LanRoster;
		$LanAttender->user_id = Auth::user()->id;
		$isAttendingLan = LanRoster::where('user_id', Auth::user()->id);
		
		if ($isAttendingLan->count() == 0) { 
			if (Input::get('attending_lan') === 'yes') {
				$LanAttender->save();
			}
		} 
		else {
			if (Input::get('attending_lan') === 'yes') {
				// This is the only way to test if it's unchecked.
				// Adding ! infront of the test doesn't seem to work.
			}
			else {
				$isAttendingLan->delete();
			}
		}
		
		$isOnTeam = false;

		foreach(LanGame::all() as $game) {
			$LanPlayer = new LanPlayer;
        	$LanPlayer->user_id = Auth::user()->id;
        	$LanPlayer->game_id = $game->id;
        	$LanPlayer->team_id = 0;
        	$isInContest = LanPlayer::where('user_id', Auth::user()->id)->where('game_id', $game->id);
        	  
        	if ($isInContest->count() == 0) {
        		if (Input::get('game' . $game->id) === 'yes') {
        			if ($game->max_players > 1) {
        				$isOnTeam = true;
        			}
        			
        			$LanPlayer->save();
        		}
        	}
        	else {
        		if (Input::get('game' . $game->id) === 'yes') {
        			if ($game->max_players > 1) {
        				$isOnTeam = true;
        			}
        			
        		}
        		else {
        			$isInContest->delete();
        		}
        	}
		}

		if ($isOnTeam == true){
			return Redirect::to('lanteam');
		}
		else {
			return Redirect::to('home');
		}
	}

	public function getIndex() {
		$this->layout->content = View::make("sig/lanparty");
	}
}