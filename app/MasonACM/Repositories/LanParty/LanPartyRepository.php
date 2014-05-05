<?php namespace MasonACM\Repositories\LanParty;

use LAN_Party;
use LAN_Attendee;
use Auth;

class LanPartyRepository implements LanPartyRepositoryInterface {


	/**
	 * Adds or removes a user from the roster
     *
     * @para int $userId
	 */
	public function addOrRemoveFromRoster($userId)
	{
		$attendee = LAN_Attendee::getByUserId($userId);

		if ($attendee == null)
		{
			$attendee = new LAN_Attendee();
			$attendee->user_id = Auth::user()->id;
			$attendee->firstname = Auth::user()->firstname;
			$attendee->lastname = Auth::user()->lastname;
			$attendee->lanparty_id = LAN_Party::getActiveParty()->id;
			$attendee->save();
		} 
		else
		{
			$attendee->delete();	
		}
	}

	public function addToRoster($input)
	{
		$lanAttendee = new LAN_Attendee;
		$lanAttendee->fill($input);
		$lanAttendee->save();

		return $lanAttendee;
	}

    /**
	 * Gets all the LAN Parties
     *
     * @return Collection
	 */
	public function getAllParties()
	{
		return LAN_Party::all();
	}

    /**
     * Get a specified LAN Party
     *
     * @param  int $id
     * @return bool|LAN_Party
     */
    public function findPartyById($id)
    {
        if (($party = LAN_Party::find($id)) != null)
        {
            return $party;
        }

        return false;
    }


    /**
     * Creates a new LAN Party
     *
     * @param  array$input
     * @return LAN_Party
     */
    public function createParty($input)
    {
        $party = new LAN_Party;

        $party->fill($input)->save();

        return $party;
    }

    /**
     * Delete a specified LAN Party
     *
     * @param int $id
     */
    public function deleteParty($id)
    {
        if ( ! $party = $this->findPartyById($id)) return false;

        $party->attendees()->delete();

        $this->findPartyById($id)->delete();
    }

    public function updateParty($id, $input)
    {
        if ( ! $party = $this->findPartyById($id)) return false;

        $party->fill($input)->save();

        return $party;
    }

    public function getActiveParty()
    {
        return LAN_Party::whereActive(true)->first();
    }

    public function setActiveParty($id)
    {
        if ( ! ($party = $this->getActiveParty()) == null)
        {
            $party->active = false;

            $party->save();
        }

        if ( ! ($party = $this->findPartyById($id)) == null)
        {
            $party->active = true;

            $party->save();
        }
    }
}