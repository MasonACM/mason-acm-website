<?php namespace MasonACM\Repositories\Team;

interface TeamRepositoryInterface {


	/**
	 * @param  int $id
	 */ 
	public function getAllWithCompetitors($gameId);
	
}
