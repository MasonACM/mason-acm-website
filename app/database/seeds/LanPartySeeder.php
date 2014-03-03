<?php

class LanPartySeeder extends Seeder 
{
	public function run()
	{
		$partys = array(
			array(
				'date' => new DateTime(),
				'active' => true
			),
			array (
				'date' => new DateTime(),
				'active' => false
			)
		);

		LAN_Party::insert($partys);
	}
}