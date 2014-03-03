<?php

class TutorialTopicSeeder 
extends Seeder
{
	public function run()
	{
		$tut_topics = [
			[
				'name' => 'Visual Basic 6'
			],

			[
				'name' => 'Visual Basic .NET'
			],

			[
				'name' => 'C++'
			],

			[
				'name' => 'Java'
			],

			[
				'name' => 'Misc'
			]
		]; // end tut_topics

		foreach($tut_topics as $tut)
		{
			TutorialTopic::create($tut);
		}
	}
}