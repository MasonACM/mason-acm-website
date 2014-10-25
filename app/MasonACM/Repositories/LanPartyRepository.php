<?php namespace MasonACM\Repositories;

use MasonACM\Models\LanParty;

class LanPartyRepository {

    /**
     * @var LanParty 
     */
    private $lanParty;

    /**
     * @param LanParty $lanParty
     */
    function __construct(LanParty $lanParty)
    {
        $this->lanParty = $lanParty;
    }

    /**
     * @return LanParty 
     */ 
    public function getAll()
    {
        return $this->lanParty->all();
    }

    /**
     * @param  int $id
     * @return LanParty
     */ 
    public function getById($id)
    {
        return $this->lanParty->find($id);
    }

    /**
     * @param  int $id
     * @return mixed
     */
    public function setActiveParty($id)
    {
        $this->deactivateActiveParty();

        $party = $this->lanParty->find($id);

        $party->fill(['active' => true])->save();

        return $party;
    }

	/**
	 * @return mixed
	 */
	public function deactivateActiveParty()
	{
		if ($party = $this->lanParty->getActiveParty())
        {
            $party->active = false;

            $party->save();

            return $party;
        }
	}

}

