<?php

use MasonACM\Repositories\LanParty\LanPartyRepositoryInterface;

class LANPartyController extends BaseController {

	private $lanParty;

	public function __construct(LanPartyRepositoryInterface $lanParty)
	{
		$this->lanParty = $lanParty;
	}

	/**
	 * Displays the LAN Party management page
	 */ 
	public function getManage()
	{
		$lans = $this->lanParty->getAll();

		return View::make('lanparty.manage', compact('lans'));
	}

	/**
	 *	Gets the LAN Party Roster view 
	 */
	public function getRoster() 
	{
		$attendees = LAN_Party::getActiveParty()->attendees;

		return View::make('lanparty.roster', compact('attendees'));	
	}

	/**
	 * Adds or removes a user to the roster
	 */
	public function postSignUp()
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
}