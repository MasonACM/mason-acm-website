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
				'active' => true,
				'created_at' => time(),
                'updated_at' => time()
			),
			array (
				'date' => Carbon::today(),
				'active' => false,
				'created_at' => time(),
                'updated_at' => time()
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

		foreach (range(1, 4) as $competitionId)
		{
			Competition::create([
				'lanparty_id' => 1,
				'max_players' => 4,
				'game_title' => $faker->text(20),
			]);
		}

		foreach (range(1, 4) as $teamId)
		{
			Team::create([
				'name' => $faker->text(10),
				'competition_id' => $teamId
			]);

			foreach (range(1, 4) as $competitorId)
			{
				Competitor::create([
					'user_id' => $teamId * $competitorId,
					'team_id' => $teamId
				]);
			}
		}

		Competition::create([
			'lanparty_id' => 1,
			'max_players' => 1,
			'game_title' => 'Super Smash Brothers'
		]);

		foreach (range(1, 4) as $index)
		{
			$team = Team::create(['competition_id' => 5]);
			Competitor::create([
				'team_id' => $team->id,
				'user_id' => $index + 20
			]);
		}
	}
}