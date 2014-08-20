<?php

use MasonACM\Models\LanAttendee;
use MasonACM\Models\LanParty;
use MasonACM\Repositories\LanAttendee\LanAttendeeRepository;
use MasonACM\Repositories\LanAttendee\LanAttendeeRepositoryInterface;

class LanAttendeeController extends BaseController {

	/**
	 * @var LanAttendeeRepositoryInterface
	 */
	private $lanAttendeeRepo;


	/**
	 * @param LanAttendeeRepositoryInterface $lanAttendeeRepo
	 */
	function __construct(LanAttendeeRepositoryInterface $lanAttendeeRepo)
	{
		$this->lanAttendeeRepo = $lanAttendeeRepo;
	}

	/**
	 * @return Response
	 */
	public function create()
	{
		$party = LanParty::getActiveParty();

		$isAttendee = LanAttendee::checkByUserId(Auth::id());

		return View::make('lanparty.register', compact('party', 'isAttendee'));
	}

	/**
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
	
		$attendee = $this->lanAttendeeRepo->create($input);

		// If the LanAttendee is being created with, 
		// JSON we will return the LanAttendee as 
		// JSON instead of redirecting the user.
		if (Request::wantsJson()) 
		{
			return $attendee;
		} 

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

		// If the user is already registered,
		// delete their LanAttendee entry
		if (LanAttendee::checkByUserId($user->id))
		{
			LanAttendee::where('user_id', $user->id)->delete();
		}
		else
		{
			LanAttendee::createFromUser($user);
		}

		return Redirect::back();
	}

}