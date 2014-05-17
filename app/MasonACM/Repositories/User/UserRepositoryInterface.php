<?php namespace MasonACM\Repositories\User;

interface UserRepositoryInterface {

	public function register($input);

	public function attemptLogin($input);

}