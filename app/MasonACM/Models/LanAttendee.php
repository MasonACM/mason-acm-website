<?php namespace MasonACM\Models;

/**
 * Class LanAttendee
 * @property string $firstname
 * @property string $lastname
 * @property int    $grad_year
 * @property int    $lanparty_id
 */
class LanAttendee extends EloquentModel {

    /**
     * @var string
     */
    protected $table = 'lan_attendees';

    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'grad_year', 'lanparty_id', 'user_id'];

    /**
     * @var array
     */
    protected static $rules = [
    		'firstname'   => 'required|max:50|alpha_dash',
    		'lastname'    => 'required|max:50|alpha_dash',
    		'grad_year'   => 'required|digits:4|numeric',
        'lanparty_id' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('MasonACM\Models\LanParty');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('MasonACM\Models\User');
	}

	/**
	 * @param  User $user
	 * @return LanAttendee
	 */
	public static function createFromUser(User $user)
    {
       return self::createAndValidate([
           'firstname'   => $user->firstname,
           'lastname'    => $user->lastname,
           'grad_year'   => $user->grad_year,
		   'user_id'     => $user->id,
           'lanparty_id' => LanParty::getActiveParty()->id
       ]);
    }

	/**
	 * @param  int $id
	 * @return bool
	 */
	public static function checkByUserId($id)
	{
		return static::where('user_id', $id)->exists();
	}

}
