<?php

use MasonACM\Repositories\Team\TeamRepositoryInterface;

class TeamController extends \BaseController {

	/**
	 * @var TeamRepositoryInterface
	 */ 
	private $teamRepo;

	/**
	 * @param TeamRepositoryInterface $teamRepo
	 */
	public function __construct(TeamRepositoryInterface $teamRepo)
	{
		$this->teamRepo = $teamRepo;
	}

	/**
	 * @param  int $id
	 * @return Response
	 */
	public function index($id)
	{
		$game = $this->teamRepo->getAllWithCompetitors($id);

		return View::make('lanparty.games.show', compact('game'));
	}

}