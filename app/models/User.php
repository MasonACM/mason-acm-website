<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use MasonACM\Presenters\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use PresentableTrait;

    protected $presenter = 'MasonACM\Presenters\UserPresenter';

    protected $table = 'users';

    protected $hidden = array('password');

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'grad_year'
    ];

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

    public function isAdmin()
    {
        return $this->role >= 1;
    }
}