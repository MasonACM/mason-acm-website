<?php

use MasonACM\Repositories\LanParty\LanPartyRepositoryInterface;

class LanAttendeeController extends BaseController {

    /**
     * @var LanPartyRepositoryInterface
     */
    private $lanRepo;

    function __construct(LanPartyRepositoryInterface $lanRepo)
    {
        $this->lanRepo = $lanRepo;
    }

    /**
	 * Add or remove a user to or from the roster
     *
     * @return Response
	 */
	public function storeOrDestroy()
	{
		$this->lanRepo->addOrRemoveFromRoster(Auth::user()->id);

		return Redirect::back()->with('reloaded', true);
	}

	/**
	 * Returns the LAN Party pre-register view
	 *
	 * @return Response
	 */
	public function create()
	{
		$party = $this->lanRepo->getActiveParty();

		$isAttendingLan = Auth::check() 
			? $this->lanRepo->isAttendingLan(Auth::user()->id)
			: false;

		return View::make('lanparty.signup', compact('party', 'isAttendingLan'));
	}

	/**
	 * Adds someone to the roster
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->lanRepo->addToRoster(Input::all());

		return Redirect::back();
	}

    /**
     * Destroy a specified LAN Attendee
     *
     * @param int $id
     */
    public function destroy($id)
    {

    }


}