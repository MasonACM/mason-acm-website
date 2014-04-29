<?php namespace MasonACM\Repositories\LanParty;

interface LanPartyRepositoryInterface {

	public function getAll();	

	public function addOrRemoveFromRoster($userId);

	public function addToRoster($input);
}