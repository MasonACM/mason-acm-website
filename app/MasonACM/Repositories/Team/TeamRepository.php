<?php namespace MasonACM\Repositories\Team;

use MasonACM\Models\Team;
use MasonACM\Models\Game;
use MasonACM\Models\LanParty;
use MasonACM\Models\Competitor;
use MasonACM\Repositories\Eloquent\EloquentRepository;

class TeamRepository extends EloquentRepository implements TeamRepositoryInterface {

	/**
	 * @var Team
	 */ 
	private $team;

	/**
	 * @var LanParty 
	 */ 
	private $party;

	/**
	 * @var Game
	 */
	private $game;

	/**
	 * @param $team  Team
	 * @param $game  Game
	 * @param $party LanParty
	 */ 
	public function __construct(Team $team, LanParty $party, Game $game)
	{
		$this->team = $team;

		$this->model = $team;

		$this->party = $pary;

		$this->game = $game;
	}

	/**
	 * @return Party
	 */ 
	public funtion getAll()
	{
		$party = $this->party->getActiveParty();

		return $party->with('games.teams.competitors.user');
	}

}

