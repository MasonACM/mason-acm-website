<?php namespace MasonACM\Models;

use Cache;
use Carbon\Carbon;
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
    	// If the active LAN Party is already in cache, return it
    	if (Cache::has('active_lan_party'))
    	{
    		return Cache::get('active_lan_party');
    	}
    	
    	// Otherwise, retrieve it from the database and store it
    	// in the cache until the date of the party. The party
    	// is removed from the cache when it's deactivated. 
		if ($party = static::where('active', true)->first())
		{
			$minutes = $party->date->diffInMinutes(Carbon::now());

			Cache::put('active_lan_party', $party, $minutes);
		}
		else
		{
			Cache::put('active_lan_party', false, 60 * 24 * 7 * 30);
		}

		return $party;
    }

    /**
     * @return boolean
     */
    public static function hasActiveParty()
    {
        return (boolean) static::getActiveParty();
    }

}