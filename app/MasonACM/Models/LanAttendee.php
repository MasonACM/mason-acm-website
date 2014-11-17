<?php namespace MasonACM\Models;

class LanAttendee extends EloquentModel {

    /**
     * @var string
     */
    protected $table = 'lan_attendees';

    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'year', 'lanparty_id', 'user_id', 'has_attended'];

    /**
     * @var array
     */
    protected static $rules = [
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

    /**
     * @return this 
     */
    public function toggleAttendance()
    {
        $this->hasAttended = !$this->hasAttended;

        $this->save();

        return $this;
    }

    /**
     * Get the firstname if it exists, otherwise
     * get it from the corresponding user
     *
     * @return string
     */
    public function getFirstnameAttribute()
    {
        if ($this->attributes['user_id'] != null) return $this->user->firstname;

        return $this->attributes['firstname'];
    }

    /**
     * Get the lastname if it exists, otherwise
     * get it from the corresponding user
     *
     * @return string
     */
    public function getLastnameAttribute()
    {
        if ($this->attributes['user_id'] != null) return $this->user->lastname;

        return $this->attributes['lastname'];
    }

    /**
     * Get the lastname if it exists, otherwise
     * get it from the corresponding user
     *
     * @return string
     */
    public function getYearAttribute()
    {
        if ($this->attributes['user_id'] != null) return $this->user->grad_year;

        return $this->attributes['year'];
    }

    /**
     * @return bool
     */
    public function getHasAttendedAttribute()
    {
        return $this->attributes['has_attended'];
    }

    /**
     * @return void
     */
    public function setHasAttendedAttribute($value)
    {
        $this->attributes['has_attended'] = $value;
    }

}
