<?php

class LAN_Attendee extends Eloquent {

	protected $table = 'lan_attendees';
	public $timestamps = false; 

	protected $fillable = [
		'user_id',
		'firstname',
		'lastname',
		'lanparty_id'
	];
	
	public function add()
	{
		
	}

	/**
	 * Determines if the logged in user is attending the active LAN Party
	 */ 
	public static function isAttendingLan() 
	{
		if (Auth::check())
		{	
			return LAN_Attendee::where('lanparty_id', LAN_Party::getActiveParty()->id)
				->where('user_id', Auth::user()->id)
				->count() > 0;
	    }
	    return false;
	}
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Gets a LAN Attendee for the active LAN Party by a user id
	 */
	public static function getByUserID($userId)
	{
		return LAN_Attendee::where('lanparty_id', LAN_Party::getActiveParty()->id)
						   ->where('user_id', $userId) 
						   ->first();
	}
}