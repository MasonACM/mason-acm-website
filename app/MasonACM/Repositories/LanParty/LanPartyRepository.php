<?php namespace MasonACM\Repositories\LanParty;

use MasonACM\Models\LanParty;
use MasonACM\Repositories\Eloquent\EloquentRepository;

class LanPartyRepository extends EloquentRepository implements LanPartyRepositoryInterface {

    /**
     * @param LanParty $lanParty
     */
    function __construct(LanParty $lanParty)
    {
        $this->model = $lanParty;
    }

    /**
     * @param  int $id
     * @return mixed
     */
    public function getPartyWithAttendees($id)
    {
        return $this->getById($id)->with('attendees');
    }

    /**
     * @param  int $id
     * @return mixed
     */
    public function setActiveParty($id)
    {
        $this->deactivateActiveParty();

        $party = $this->getById($id);

        $party->update(['active' => true])->save();

        return $party;
    }

	/**
	 * @return mixed
	 */
	public function deactivateActiveParty()
	{
		return $this->model->getActiveParty()->fill(['active', false])->save();
	}
}
