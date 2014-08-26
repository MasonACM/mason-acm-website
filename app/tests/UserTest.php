<?php

use MasonACM\Models\User;

class UserTest extends TestCase {

	/** @test */
	public function it_hashes_the_password_after_validation()
	{
		$password = str_random(20);

		$user = $this->createUser([
			'password'              => $password,
			'password_confirmation' => $password
		]);	

		$passwordIsHashed = Hash::check($password, $user->password);

		$this->assertTrue($passwordIsHashed);
	}	

	/**
	 * Create a user
	 *
	 * @param  array $attributes
	 * @return User
	 */
	private function createUser($attributes = [])
	{
		$defaults = [
			'firstname'             => $this->fake->firstName(),
			'lastname'              => $this->fake->lastName(),
			'email'                 => $this->fake->email(),
			'grad_year'             => $this->fake->year(),
			'password'              => 'password',
			'password_confirmation' => 'password'
		];

		$attributes = array_merge($defaults, $attributes);

		return User::createAndValidate($attributes);
	}

}