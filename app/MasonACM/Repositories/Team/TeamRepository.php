<?php namespace MasonACM\Repositories\Team;

use MasonACM\Models\Team;
use MasonACM\Models\Game;
use MasonACM\Models\LanParty;
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
		$this->party = $party;
		$this->game = $game;
	}

	/**
	 * @param  int $id
	 * @return Party
	 */
	public function getAllWithCompetitors($id)
	{
		return $this->game->where('id', $id)
						  ->with('teams.competitors.user')
			  			  ->first();
	}

}

