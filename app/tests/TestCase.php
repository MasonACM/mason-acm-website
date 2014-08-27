<?php

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

class TestCase extends LaravelTestCase {

	/**
	 * @var Faker 
	 */ 
	protected $fake;

	/**
	 * @var int
	 */
	protected $count;

	/**
	 * Initialize the Faker library
	 */
	public function __construct()
	{
		$this->fake = Faker::create();
		$this->count = 1;
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

	/**
	 * @param  int $times
	 * @return $this
	 */
	public function times($times)
	{
		$this->count = $times;

		return $this;
	}

}
