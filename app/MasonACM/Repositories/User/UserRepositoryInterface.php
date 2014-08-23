<?php namespace MasonACM\Repositories\User;

interface UserRepositoryInterface {

	/**
	 * @param  int    $count
	 * @param  string $sortBy
	 * @param  string $sortOrder
	 * @return User
	 */
	public function getAllSorted($count, $sortBy, $sortOrder);

}