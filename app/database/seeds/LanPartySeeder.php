<?php

use Carbon\Carbon;
use MasonACM\Models\LanAttendee;
use MasonACM\Models\LanParty;

class LanPartySeeder extends Seeder 
{
	public function run()
	{
		$faker = Faker\Factory::create();

		$partys = array(
			array(
				'date' => Carbon::today(),
				'active' => true
			),
			array (
				'date' => Carbon::today(),
				'active' => false
			)
		);

		LanParty::insert($partys);

		foreach (range(1, 100) as $index)
		{
			LanAttendee::create([
				'firstname'   => $faker->firstName(),
				'lastname'    => $faker->lastName(),
				'lanparty_id' => 1,
				'grad_year'   => $faker->year()
			]);
		}

	}
}