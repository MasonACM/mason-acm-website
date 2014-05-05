<?php namespace MasonACM\Repositories\LanParty;

interface LanPartyRepositoryInterface {

    // LAN Party
	public function getAllParties();

    public function findPartyById($id);

    public function createParty($input);

    public function deleteParty($id);

    public function updateParty($id, $input);

    public function getActiveParty();

    public function setActiveParty($id);

    // LAN Attendee
	public function addOrRemoveFromRoster($userId);

	public function addToRoster($input);
}