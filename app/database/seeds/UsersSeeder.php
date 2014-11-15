<?php

use MasonACM\Models\User;
use MasonACM\Models\LanAttendee;

class UsersSeeder extends Seeder {

    public function run()
    {        
        $faker = Faker\Factory::create();

        $users = [];

        $attendees = [];

        $count = 1;

        $password = Hash::make('busta33');

        User::create([
            'firstname' => 'admin',
            'lastname'  => 'admin',
            'password'  => 'busta33',
            'email'     => 'admin@masonacm.org',                
            'grad_year' => 2015,
            "role"      => 2
        ]);

        foreach (range(1, 200) as $index)
        {
            array_push($users, [
                'firstname' => $faker->firstName(),
                'lastname'  => $faker->lastName(),
                'email'     => $faker->email(),
                'password'  => $password,
                'grad_year' => $faker->numberBetween(2014, 2019),
                'created_at' => time(),
                'updated_at' => time(),
                'role'      => 0,
            ]);

            array_push($attendees, [
                'lanparty_id' => 2,
                'created_at' => time(),
                'updated_at' => time(),
                'user_id' => ++$count
            ]);

        }

        User::insert($users);

        LanAttendee::insert($attendees);

    }
}