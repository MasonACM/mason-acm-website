<?php

use MasonACM\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                "firstname" => "admin",
                "lastname"  => "admin",
                "password"  => Hash::make("narwall3"),
                "email"     => "admin@masonacm.org",                
                "grad_year" => 2015,
                "role"      => 2
            ], 
            [
                "firstname" => "peasant",
                "lastname"  => "busta",
                "password"  => Hash::make("narwall3"),
                "email"     => "peasant.busta@gmail.com",                
                "grad_year" => 2015,
                "role"      => 0
            ]
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}