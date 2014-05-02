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

    public function attendee()
    {
        return $this->hasOne('LAN_Attendee', 'user_id');
    }

    public function isAdmin()
    {
        return $this->role >= 1;
    }

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

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}