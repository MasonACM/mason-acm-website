<?php namespace MasonACM\Repositories;

use Carbon\Carbon;
use MasonACM\Models\User;

class UserRepository {

	/**
	 * @var User
	 */ 
	private $user;

	/**
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * @param  int    $count
	 * @param  string $sortBy
	 * @param  string $sortOrder
	 * @return User
	 */
	public function getAllSorted($count = 3, $sortBy = 'id', $sortOrder = 'asc')
	{
		return $this->user->orderBy($sortBy, $sortOrder)->paginate($count);
	}

	/**
	 * Get a list of users between certain year 
	 */ 
	public function getAllMembers()
	{
		$now = Carbon::now();
	
		if ($now->month <= 6)
		{
			$minYear = $now->year;
			$maxYear = $now->year + 5;
		}
		else
		{
			$minYear = $now->year + 1;
			$maxYear = $minYear + 4;
		}

		return $this->user->whereBetween('grad_year', [
			$minYear, $maxYear
		])->get();
	}

}
