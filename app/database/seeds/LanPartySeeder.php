<?php

use Carbon\Carbon;

class LanPartySeeder extends Seeder 
{
	public function run()
	{
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

		LAN_Party::insert($partys);
	}
}