<?php

class LANPartyController extends BaseController {

	/**
	 * Displays the LAN Party management page
	 */ 
	public function getManage()
	{
		$lans = LanParty::all();

		return View::make('lanparty.manage');
	}

	/**
	 *	Gets the LAN Party Roster view 
	 */
	public function getRoster() 
	{
		$attendees = LAN_Attendee::where('lanparty_id', LAN_Party::getActiveParty()->id);
		return View::make('lanparty.roster', compact('attendees'));	
	}

	/**
	 * Adds a user to the roster
	 */
	public function postAddToRoster()
	{

	}

	/**
	 * Returns the LAN Party Sign-up view 
	 */ 
	public function getSignUp()
	{
		$party = LAN_Party::getActiveParty();
		$isAttendingLan = LAN_Attendee::isAttendingLan();

		return View::make('lanparty.signup', compact('party', 'isAttendingLan'));
	}

	/**
	 * Adds or removes a user form the roster
	 */ 
	public function postSignUp() 
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
}