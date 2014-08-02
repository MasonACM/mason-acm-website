<?php namespace MasonACM\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use MasonACM\Presenters\PresentableTrait;
use Hash;

class User extends EloquentModel implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, PresentableTrait;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'grad_year', 'password'];

    /**
     * @var array
     */
    protected static $rules = [
		'email'     => 'required|email|max:50',
		'password'  => 'required|min:6|confirmed',
		'firstname' => 'required|max:50|alpha_dash',
		'lastname'  => 'required|max:50|alpha_dash',
		'grad_year' => 'required|digits:4|numeric'
    ];

    /**
     * @var string
     */
    protected $presenter = 'MasonACM\Presenters\UserPresenter';

    /**
     * @param  array  $attributes
     * @return User
     */
    public static function createAndValidate(array $attributes)
    {
        static::validate($attributes);

        $attributes['password'] = Hash::make($attributes['password']);

        return parent::create($attributes);
    }

    /**
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role >= 1;
    }

    /**
     * @return \Collection
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }

}
