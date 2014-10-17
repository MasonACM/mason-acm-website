<?php namespace MasonACM\Repositories;

use MasonACM\Models\LanParty;
use MasonACM\Models\Competition;

class CompetitionRepository {

	/**
	 * @var LanParty
	 */
	private $lanParty;

	/**
	 * @var Competition
	 */ 
	private $competition;

	/**
	 * @param Competition $competition
	 * @param LanParty    $lanParty
	 */
	public function __construct(Competition $competition, LanParty $lanParty)
	{
		$this->competition = $competition;
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
		return $this->competition->where('id', $id)->with('teams.competitors.user')->first();
	}

	/**
	 * Get all the competitions for the active LAN Party
	 *
	 * @return Competition
	 */
	public function getAllActive()
	{
		return $this->competition->where('lanparty_id', $this->lanParty->getActiveParty()->id)->get();
	}
	
}
