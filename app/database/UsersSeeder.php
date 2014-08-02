<?php

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                "firstname" => "admin",
                "lastname"  => "admin",
                "password"  => "masonacm123",
                "email"     => "admin@masonacm.org",                
                "grad_year" => 2015,
                "role"      => 2
            ], 
            [
                "firstname" => "peasant",
                "lastname"  => "busta",
                "password"  => Hash::make("masonacm123"),
                "email"     => "peasant.busta@gmail.com",                
                "grad_year" => 2015,
                "role"      => 0
            ]
        ];

        foreach ($users as $user)
        {
            MasonACM\Models\User::createAndValidate($user);
        }
    }
}