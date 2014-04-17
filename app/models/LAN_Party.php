<?php

class LAN_Party extends Eloquent
{
	protected $table = 'lan_partys';	

	public function attendees()
	{
		return $this->hasMany('LAN_Attendee', 'lanparty_id');
	}

    public function getDate()
    {
    	$date = new DateTime($this->date);
    	return date_format($date, 'F jS Y');
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