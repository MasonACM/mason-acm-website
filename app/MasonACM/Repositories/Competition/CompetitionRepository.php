<?php namespace MasonACM\Repositories\Competition;

use MasonACM\Models\Competition;
use MasonACM\Models\LanParty;
use MasonACM\Repositories\Eloquent\EloquentRepository;

class CompetitionRepository extends EloquentRepository implements CompetitionRepositoryInterface {

	/**
	 * @var LanParty
	 */
	private $lanParty;

	public function __construct(Competition $competition, LanParty $lanParty)
	{
		$this->model = $competition;
		$this->lanParty = $lanParty;
	}

	/**
	 * Get a competition and eager load its teams
	 *
	 * @param  int $id
	 * @return Competition|null|static
	 */
	public function getByIdWithTeams($id)
	{
		return $this->model->where('id', $id)->with('teams.competitors.user')->first();
	}


	/**
	 * Get all the competitions for the active LAN Party
	 *
	 * @return Competition
	 */
	public function getAllActive()
	{
		return $this->model->where('lanparty_id', $this->lanParty->getActiveParty()->id)->get();
	}
	
}
