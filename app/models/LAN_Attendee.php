<?php

// This model is for people competing in the LAN Party Contests

class LAN_Attendee extends Eloquent
{
	protected $table = 'lan_attendees';
	public $timestamps = false; 
	
	public function fillName() 
	{
		$this->firstname = Auth::user()->firstname;
		$this->lastname = Auth::user()->lastname;
	}
	
	public static function isAttendingLan() 
	{
		return LAN_Attendee::where('user_id', Auth::user()->id)->count() > 0;
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