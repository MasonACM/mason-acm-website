<?php

use MasonACM\Models\User;

class UserCreationTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testThePasswordIsHashed()
	{
		Artisan::call('migrate:refresh');

		$attributes = [
			'firstname'             => 'Brennan',
			'lastname'              => 'Hoeting',
			'email'                 => 'brennan.hoeting@gmail.com',
			'password'              => 'passwordlol',
			'password_confirmation' => 'passwordlol',
			'grad_year'             => 2014
		];

		$user = User::createAndValidate($attributes);

		$this->assertTrue(Hash::check('passwordlol', $user->password));
	}	

}