<?php namespace MasonACM\Repositories\Competition;

interface CompetitionRepositoryInterface {


	/**
	 * @param  int $id
	 */ 
	public function getByIdWithTeams($id);


	/**
	 * @return Competition
	 */
	public function getAllActive();
	
}