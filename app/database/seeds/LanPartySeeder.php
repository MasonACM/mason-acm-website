<?php

use Carbon\Carbon;
use MasonACM\Models\Competition;
use MasonACM\Models\LanAttendee;
use MasonACM\Models\Competitor;
use MasonACM\Models\LanParty;
use MasonACM\Models\Team;

class LanPartySeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		$parties = array(
			array(
				'date' => Carbon::today(),
				'active' => true
			),
			array (
				'date' => Carbon::today(),
				'active' => false
			)
		);

		LanParty::insert($parties);

		foreach (range(1, 100) as $index)
		{
			LanAttendee::create([
				'firstname'   => $faker->firstName(),
				'lastname'    => $faker->lastName(),
				'grad_year'   => $faker->year(),
				'lanparty_id' => 1
			]);
		}
	}
}