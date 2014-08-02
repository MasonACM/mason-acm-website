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

}
