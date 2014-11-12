<?php

use MasonACM\Models\LanParty;
use MasonACM\Models\Competition;
use MasonACM\Repositories\CompetitionRepository;

class CompetitionController extends \BaseController {

	/**
	 * @var CompetitionRepository
	 */
	private $compRepo;

	/**
	 * @param CompetitionRepository $compRepo
	 */
	function __construct(CompetitionRepository $compRepo)
	{
		$this->compRepo = $compRepo;
	}

	/**
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$input['lanparty_id'] = LanParty::getActiveParty()->id;

		$competition = Competition::create($input);

		return Redirect::back();
	}

	/**
	 * @return Response
	 */
	public function edit($id)
	{
		$competition = Competition::find($id);

		return View::make('lanparty.competition.edit', compact('competition'));
	}

	/**
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$competition = Competition::find($id);

		$competition->fill(Input::all())->save();

		return Redirect::route('competitions.index');
	}

	/**
	 * @return Response
	 */
	public function index()
	{
		$competitions = $this->compRepo->getAllActive();

		return View::make('lanparty.competition.index', compact('competitions'));
	}

	/**
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$competition = $this->compRepo->getByIdWithTeams($id);

		$isPlayingGame = $competition->check();

		return View::make('lanparty.competition.show', compact('competition', 'isPlayingGame'));
	}

	public function destroy($id)
	{
		$competition = Competition::find($id);

		foreach ($competition->teams() as $team) $team->competitors->delete();

		$competition->teams()->delete();

		$competition->delete();

		return Redirect::back();
	}

}
