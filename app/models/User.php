<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    public static $rules = array(
        'firstname'=>'required|alpha|min:2',
        'lastname'=>'required|alpha|min:2',
        'email'=>'required|email|unique:users',
        'grad-year' => 'required|integer',
        'password'=>'required|alpha_num|between:6,20|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,20'
    );

    protected $table = 'users';
    protected $hidden = array('password');

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function fullname()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function removeUser() 
    {
        $lan_Player = LanPlayer::where('user_id', $this->id);
        $lan_Roster = LanRoster::where('user_id', $this->id);

        if ($lan_Player->count() >= 1) $lan_Player->delete();
        if ($lan_Roster->count() >= 1) $lan_Roster->delete();

        $this->delete();    
    }

    public function attendee()
    {
        return $this->hasOne('LAN_Attendee', 'user_id');
    }
}