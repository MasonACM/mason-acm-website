<?php namespace MasonACM\Repositories\LanParty;

use LAN_Party;
use LAN_Attendee;
use Auth;
use Carbon\Carbon;
use User;

class LanPartyRepository implements LanPartyRepositoryInterface {

	/**
	 * Adds or removes a user from the roster
     *
     * @para int $userId
	 */
	public function addOrRemoveFromRoster($userId)
	{
		$attendee = LAN_Attendee::getByUserId($userId);
        $user = User::find($userId);

		if ($attendee == null)
		{
			$attendee = new LAN_Attendee();
			$attendee->user_id = $userId;
			$attendee->firstname = $user->firstname;
			$attendee->lastname = $user->lastname;
			$attendee->lanparty_id = $this->getActiveParty()->id;
			$attendee->save();
		} 
		else
		{
			$attendee->delete();	
		}
	}

    /**
     * Add to the current LAN party's roster
     *
     * @param  array $input
     * @return LAN_Attendee
     */
    public function addToRoster($input)
	{
		$lanAttendee = new LAN_Attendee;
		$lanAttendee->fill($input);
		$lanAttendee->save();

		return $lanAttendee;
	}

    /**
     * Determine if a specified user is attending the active LAN Party
     *
     * @param  int $user_id
     * @return bool
     */
    public function isAttendingLan($user_id)
    {
        return $this->getActiveParty()->attendees()->where('user_id', $user_id)->count() > 0;
    }

    /**
	 * Get all the LAN Parties, ordered by date
     *
     * @return Collection
	 */
	public function getAllParties()
	{
		return LAN_Party::orderBy('date', 'desc')->get();
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

        $input['date'] = new Carbon($input['date']); 

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

    /**
     * Update a specified LAN Party
     *
     * @param $id
     * @param $input
     * @return bool|LAN_Party
     */
    public function updateParty($id, $input)
    {
        if ( ! $party = $this->findPartyById($id)) return false;

        $input['date'] = new Carbon($input['date']); 

        $party->fill($input)->save();

        return $party;
    }

    /**
     * Get the active LAN Party
     *
     * @return LAN_Party
     */
    public function getActiveParty()
    {
        return LAN_Party::whereActive(true)->first();
    }

    /**
     * Set the active LAN Party
     *
     * @param  int $id
     * @return LAN_Party $party
     */
    public function setActiveParty($id)
    {
        // Set the active party to inactive (if there is one)
        if ( ! ($party = $this->getActiveParty()) == null)
        {
            $party->active = false;

            $party->save();
        }

        // Make the specified party active
        $party = $this->setPartyActivity($id, true);

        return $party;
    }

    /**
     * Set the activity of a specified LAN Party
     * 
     * @param  int $id
     * @param  boolean $active
     * @return LAN_Party|boolean
     *
     */ 
    public function setPartyActivity($id, $active)
    {
        if ( ! ($party = $this->findPartyById($id)) == null)
        {
            $party->active = $active;

            $party->save();

            return $party;
        }

        return false;
    }
}