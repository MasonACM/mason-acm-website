<?php

use Carbon\Carbon;
use MasonACM\Exceptions\ModelNotValidException;
use MasonACM\Repositories\LanParty\LanPartyRepositoryInterface;

class LanPartyController extends BaseController {

    /**
     * @var LanPartyRepositoryInterface
     */
    private $lanPartyRepo;

	/**
	 * @param LanPartyRepositoryInterface $lanPartyRepo
	 */
	public function __construct(LanPartyRepositoryInterface $lanPartyRepo)
	{
		$this->lanPartyRepo = $lanPartyRepo;
	}

	/**
	 * @return mixed
	 */
	public function index()
	{
		$parties = $this->lanPartyRepo->getAll();

		return View::make('lanparty.index')->withParties($parties);
	}

	/**
	 * @param  int $id
	 * @return mixed
	 */
	public function show($id)
	{
		$party = $this->lanPartyRepo->getById($id);

		$attendees = $party->attendees;

		if (Request::wantsJson()) return Response::json($attendees);

		return View::make('lanparty.roster.index')->withParty($party);
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store()
    {
		$input = Input::all();

		$input['date'] = new Carbon($input['date']);

		$this->lanPartyRepo->create($input);

		return Redirect::back();
    }

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update($id)
    {
    	$this->lanPartyRepo->update($id, Input::all());

    	return Redirect::back();
    }

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
    {
    	$this->lanPartyRepo->delete($id);

    	return Redirect::back();
    }

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function activate($id)
    {
		$this->lanPartyRepo->setActiveParty($id);

    	return Redirect::back();
    }

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deactivate()
    {
		$this->lanPartyRepo->deactivateActiveParty();

    	return Redirect::back();
    }

}
