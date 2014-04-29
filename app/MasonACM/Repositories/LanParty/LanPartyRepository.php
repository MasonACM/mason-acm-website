<?php namespace MasonACM\Repositories\LanParty;

use LAN_Party;
use LAN_Attendee;
use Auth;

class LanPartyRepository implements LanPartyRepositoryInterface {

	/**
	 * Gets all the LAN Parties
	 */
	public function getAll()
	{
		return LAN_Party::all();
	}

	/**
	 * Adds or removes a user from the roster
	 */
	public function addOrRemoveFromRoster($userId)
	{
		$attendee = LAN_Attendee::getByUserId($userId);

		if ($attendee == null)
		{
			$attendee = new LAN_Attendee();
			$attendee->user_id = Auth::user()->id;
			$attendee->firstname = Auth::user()->firstname;
			$attendee->lastname = Auth::user()->lastname;
			$attendee->lanparty_id = LAN_Party::getActiveParty()->id;
			$attendee->save();
		} 
		else 
		{
			$attendee->delete();	
		}
	}

	public function addToRoster($input)
	{
		$lanAttendee = new LAN_Attendee;
		$lanAttendee->fill($input);
		$lanAttendee->save();

		return $lanAttendee;
	}
}