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

		return View::make('lanparty.roster.index', compact('attendees'));	
	}

	/**
	 * Adds or removes a user to the roster
	 */
	public function postSignUp()
	{
		$this->lanParty->addOrRemoveFromRoster(Auth::user()->id);

		return Redirect::back();
	}

	/**
	 * Returns the LAN Party Sign-up view 
	 *
	 * @return Response
	 */ 
	public function getSignUp()
	{
		$party = LAN_Party::getActiveParty();
		$isAttendingLan = LAN_Attendee::isAttendingLan();

		return View::make('lanparty.signup', compact('party', 'isAttendingLan'));
	}

	/**
	 * Adds someone to the roster
	 * 
	 * @return Response
	 */ 
	public function postAddToRoster() 
	{
		$this->lanParty->addToRoster(Input::all());

		return Redirect::back();
	}
}