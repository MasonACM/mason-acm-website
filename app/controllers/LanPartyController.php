<?php

class LANPartyController extends BaseController {
	protected $layout = 'layouts.master';

	public function getIndex()
	{
		return Redirect::to('lanparty/signup');
	}

	/**
	 *	Gets the LAN Party Roster view 
	 */
	public function getRoster() 
	{
		$attendees = LAN_Attendee::all(); 
		return View::make('lanparty.roster', compact('attendees'));	
	}

	/**
	 * Gets the LAN Party competition view 
	 */ 
	public function getCompetitions()
	{
		return View::make('lanparty.competitions');
	}

	/**
	 * Returns the LAN Party Sign-up view 
	 */ 
	public function getSignup()
	{
		$party = LAN_Party::getActiveParty();
		return View::make('lanparty.signup', compact('party'));
	}

	/**
	 * Adds or removes a user form the roster
	 */ 
	public function postSignup() 
	{
		if (!LAN_Attendee::isAttendingLan()) {
			$attendee = new LAN_Attendee();
			$attendee->user_id = Auth::user()->id;
			$attendee->fillname();
			$attendee->lanparty_id = LAN_Party::getActiveParty()->id;
			$attendee->save();
			return Redirect::to('lanparty/signup');
		} else {
			LAN_Attendee::where('user_id', Auth::user()->id)->delete();
			return Redirect::to('lanparty/signup');
		}
	}

	/**
	 * Returns the Game Signup view 
	 */ 
	public function getGames()
	{
		return View::make('lanparty.game_signup');
	}

	/**
	 * Handles POST request for game sign-up
	 */ 
	public function postGames()
	{
		
	}
}