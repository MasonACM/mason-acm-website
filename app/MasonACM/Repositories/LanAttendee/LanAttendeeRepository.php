<?php namespace MasonACM\Repositories\LanAttendee;

use MasonACM\Models\LanAttendee;
use MasonACM\Repositories\Eloquent\EloquentRepository;

class LanAttendeeRepository extends EloquentRepository implements LanAttendeeRepositoryInterface {

	/**
	 * @param LanAttendee $lanAttendee
	 */
	function __construct(LanAttendee $lanAttendee)
	{
		$this->model = $lanAttendee;
	}

}