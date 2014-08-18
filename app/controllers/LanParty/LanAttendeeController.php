<?php

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
	public function store()
	{
		$attendee = $this->lanAttendeeRepo->create(Input::all());

		if (Request::wantsJson()) return $attendee;

		return Redirect::back();
	}

}