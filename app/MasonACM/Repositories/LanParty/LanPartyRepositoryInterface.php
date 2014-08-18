<?php namespace MasonACM\Repositories\LanParty;

interface LanPartyRepositoryInterface {

    /**
     * @param  int $id
     * @return mixed
     */
    public function getPartyWithAttendees($id);

    /**
     * @param  int $id
     * @return mixed
     */
    public function setActiveParty($id);

	/**
	 * @return mixed
	 */
	public function deactivateActiveParty();

}