<?php

use MasonACM\Models\LanParty;
use MasonACM\Models\LanAttendee;

class LanAttendeeController extends \BaseController {

	/**
	 * @var LanAttendee
	 */
	private $lanAttendee;


	/**
	 * @param LanAttendee $lanAttendee
	 */
	function __construct(LanAttendee $lanAttendee)
	{
		$this->lanAttendee = $lanAttendee;
	}

	/**
	 * @return Response
	 */
	public function create()
	{
		$party = LanParty::getActiveParty();

		$isAttendee = $this->lanAttendee->checkByUserId(Auth::id());

		return View::make('lanparty.register', compact('party', 'isAttendee'));
	}

	/**
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
	
		$attendee = $this->lanAttendee->createAndValidate($input);

		// If the LanAttendee is being created with, 
		// JSON we will return the LanAttendee as 
		// JSON instead of redirecting the user.
		if (Request::wantsJson()) return $attendee;

		return Redirect::back();
	}

	/**
	 * Create a LanAttendee from a User object
	 * 
	 * @return Response
	 */ 
	public function storeFromUser()
	{
		$user = Auth::user();

		// If the user is already registered, delete their LanAttendee entry
		if ($this->lanAttendee->checkByUserId($user->id))
		{
			$this->lanAttendee->where('user_id', $user->id)->delete();
		}
		else
		{
			$this->lanAttendee->createFromUser($user);
		}

		return Redirect::back();
	}

	/**
	 * Toggle the an Attendee's attendance
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function toggleAttendance($id)
	{
		$attendee = $this->lanAttendee->find($id)->toggleAttendance();

		if (Request::wantsJson()) return Response::json($attendee);

		return Redirect::back();
	}

}
