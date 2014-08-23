<?php namespace MasonACM\Repositories\User;

use MasonACM\Repositories\Eloquent\EloquentRepository;
use MasonACM\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface {

	/**
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->model = $user;
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
