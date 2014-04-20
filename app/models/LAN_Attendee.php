<?php

class LAN_Attendee extends Eloquent {

	protected $table = 'lan_attendees';
	public $timestamps = false; 
	
	public function create()
	{
		
	}

	/**
	 * Determines if the logged in user is attending the active LAN Party
	 */ 
	public static function isAttendingLan() 
	{
		return LAN_Attendee::where('lanparty_id', LAN_Party::getActiveParty()->id)
						   ->where('user_id', Auth::user()->id)
						   ->count() > 0;
	}
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public static function getByUserID()
	{
		return LAN_Attendee::where('user_id', Auth::user()->id)->first();
	}
}