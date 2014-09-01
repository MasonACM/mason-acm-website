<?php namespace MasonACM\Repositories;

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
	public function getAllSorted($count = 8, $sortBy = 'id', $sortOrder = 'asc')
	{
		return $this->model->orderBy($sortBy, $sortOrder)->paginate($count);
	}

}
