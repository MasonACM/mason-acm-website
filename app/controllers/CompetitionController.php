<?php

use MasonACM\Repositories\Competition\CompetitionRepositoryInterface;

class CompetitionController extends \BaseController {

	/**
	 * @var CompetitionRepositoryInterface
	 */
	private $compRepo;

	/**
	 * @param CompetitionRepositoryInterface $compRepo
	 */
	function __construct(CompetitionRepositoryInterface $compRepo)
	{
		$this->compRepo = $compRepo;
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

		return View::make('lanparty.competition.show', compact('competition'));
	}

}
