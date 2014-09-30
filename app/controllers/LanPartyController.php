<?php

use Carbon\Carbon;
use MasonACM\Models\LanParty;
use MasonACM\Exceptions\ModelNotValidException;
use MasonACM\Repositories\LanPartyRepository;

class LanPartyController extends BaseController {

  /**
   * @var LanPartyRepository
   */
  private $lanPartyRepo;

  /**
   * @var LanParty
   */
  private $lanParty;

	/**
	 * @param LanPartyRepository $lanPartyRepo
	 */
	public function __construct(LanPartyRepository $lanPartyRepo, LanParty $lanParty)
	{
		$this->lanPartyRepo = $lanPartyRepo;
    $this->lanParty = $lanParty;
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

		$this->lanParty->create($input);

		return Redirect::back();
  }

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update($id)
  {
    $this->lanParty->find($id)->fill(Input::all());

    return Redirect::back();
  }

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
  {
    $this->lanParty->delete($id);

    return Redirect::back();
  }

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function activate($id)
  {
		$this->lanPartyRepo->setActiveParty($id);

		Cache::forget('active_lan_party');

    return Redirect::back();
  }

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deactivate()
  {
		$this->lanPartyRepo->deactivateActiveParty();

		Cache::forget('active_lan_party');

    return Redirect::back();
  }

}
