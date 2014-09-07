<?php namespace MasonACM\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use MasonACM\Presenters\PresentableTrait;
use Hash;

/**
 * @property mixed firstname
 * @property mixed lastname
 * @property mixed grad_year
 * @property mixed id
 */
class User extends EloquentModel implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, PresentableTrait;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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
     * Hash a password whenever it's being set
     */ 
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @param  array  $attributes
     * @return User
     */
    public static function createAndValidate(array $attributes)
    {
        static::validate($attributes);

        $user = new User($attributes);
        
        $user->password = $attributes['password'];

        $user->role = 0;

        $user->save();

        return $user;
    }

	/**
	 * @param  array $attributes
	 * @return $this
	 * @throws \MasonACM\Exceptions\ModelNotValidException
	 */
	public function updateAndValidate(array $attributes)
	{
		static::validate($attributes, ['email', 'password', 'password_confirmation']);

		$user = parent::fill($attributes);

		$user->save();

		return $user;
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
