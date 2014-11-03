<?php namespace MasonACM\Models;

use Auth;

class Team extends EloquentModel {

	/**
	 * @var string 
	 */ 
	protected $table = 'teams';

	/**
	 * @var array
	 */ 
	protected $fillable = ['name', 'competition_id'];

	/**
	 * @var array
	 */
	protected static $rules = [
		'name'           => 'sometimes|min:2|max:50',
		'competition_id' => 'numeric'
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
	public function competition()
	{
		return $this->belongsTo('MasonACM\Models\Competition');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function competitors()
	{
		return $this->hasMany('MasonACM\Models\Competitor');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function competitor()
	{
		return $this->hasOne('MasonACM\Models\Competitor');
	}

	/**
	 * @return boolean
	 */ 
	public function isFull()
	{
		return $this->competitors()->count() >= $this->competition->max_players && $this->competition->max_players != 1;
	}

	/**
	 * Check if the logged in user is either an
	 * admin or the captain of the team
	 *
	 * @return bool
	 */
	public function canBeDeleted()
	{
		if (Auth::admin()) return true;

		return checkCaptain();
	}

	/**
	 * Check if the logged in user is the "captain",
	 * or the first member of the team
	 *
	 * @return bool
	 */
	public function checkCaptain()
	{
		return $this->competitors()->first()->user_id == Auth::id();
	}

	/**
	 * Remove the specified competitor from the team
	 */
	public function kick($competitorId)
	{
		if ($this->checkCaptain())
		{
			$competitor = Competitor::find($competitorId);

			// Delete the team if the last member kicks themselve
			if ($competitor->team->competitors()->count() <= 1) $competitor->team->delete();

			return $competitor->delete();
		}

		return false;
	}

	/**
	 * @return int
	 */
	public function memberCount()
	{
		return $this->competitors()->count();
	}

	/**
	 * Check if the logged on user is apart of the team
	 */
	public function check()
	{
		return $this->competitors()->where('user_id', Auth::id())->exists();
	}

	/**
	 * @return string
	 */
	public function playerName()
	{
		return $this->competitor->user->present()->fullName();
	}

}
