<?php

use Carbon\Carbon;
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

		foreach (range(1, 5) as $teamId)
		{
			Team::create([
				'game_id' => 1,
				'name'    => $faker->text(20)
			]);

			foreach (range(1, 5) as $competitorId)
			{
				Competitor::create([
					'team_id' => $teamId,
					'user_id' => $competitorId
				]);
			}	
		}		
	}
}