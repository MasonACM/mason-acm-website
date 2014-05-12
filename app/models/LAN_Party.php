<?php

use MasonACM\Presenters\PresentableTrait;

class LAN_Party extends Eloquent {

    use PresentableTrait;

    protected $presenter = 'MasonACM\Presenters\LanPartyPresenter';

	protected $table = 'lan_partys';

    protected $dates = ['date'];

	public function attendees()
	{
		return $this->hasMany('LAN_Attendee', 'lanparty_id');
	}

    public function attendeeCount() 
    {
        return $this->attendees()->count();
    }

    public function date()
    {
        return $this->date;
    }

    public static function getActiveParty()
    {
    	return LAN_Party::where('active', 'true')->first();
    }

    public static function hasActiveParty()
    {
        return LAN_Party::where('active', 'true')->count() > 0;
    }
}