<?php namespace MasonACM\Models;

use MasonACM\Presenters\PresentableTrait;

/**
 * Class LanParty
 * @property int     $id
 * @property boolean $active
 */
class LanParty extends EloquentModel {

	use PresentableTrait;

	/**
	 * @var string
	 */
	protected $table = 'lan_parties';

	/**
	 * @var array
	 */
	protected $fillable = ['active', 'date'];

	/**
	 * @var array
	 */
	protected $dates = ['date'];

	/**
	 * @var array
	 */ 
	protected static $rules = [
		'date'   => 'date',
		'active' => 'boolean'
	];

	/**
     * @var string
     */
    protected $presenter = 'MasonACM\Presenters\LanPartyPresenter';

	public function attendees()
	{
		return $this->hasMany('MasonACM\Models\LanAttendee', 'lanparty_id');
	}

    /**
     * @return LanParty
     */
    public static function getActiveParty()
    {
        return static::where('active', true)->first();
    }

    /**
     * @return boolean
     */
    public static function hasActiveParty()
    {
        return (boolean) static::getActiveParty();
    }

}