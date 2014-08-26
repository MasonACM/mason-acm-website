<?php

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

class TestCase extends LaravelTestCase {

	/**
	 * @var Faker 
	 */ 
	protected $fake;

	/**
	 * Initialize the Faker library
	 */
	public function __construct()
	{
		$this->fake = Faker::create();
	}

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	/**
	 * @return void
	 */ 
	public function setUp()
	{
		parent::setUp();

		Artisan::call('migrate');
	}

}
