<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UserTableSeeder extends Seeder {

    public function run() {
        User::truncate();

        User::create(
            [ 
                'player_name' => 'JRizzle', 
                'email' => 'jrizzle8888@gmail.com', 
                'password' => Hash::make('admin123'), 
                'first_name' => 'Josh', 
                'last_name' => 'Riley', 
                'city' => 'Port Neches', 
                'state' => 'TX', 
                'phone' => '409-123-1234', 
                'points' => 26, 
                'role' => 'super_admin',
                'valid_license' => 1 
            ]
        );
        
        User::create(
            [ 
                'player_name' => 'Eagle', 
                'email' => 'shaunbarton@gmail.com', 
                'password' => Hash::make('admin123'), 
                'first_name' => 'Shaun', 
                'last_name' => 'Barton', 
                'city' => 'Tulsa', 
                'state' => 'OK', 
                'phone' => '409-123-1234', 
                'points' => 21, 
                'role' => 'super_admin', 
                'valid_license' => 1 
            ]
        );
        
        User::create(
            [ 
                'player_name' => 'Jeff', 
                'email' => 'jeff@jeff.com', 
                'password' => Hash::make('user123'), 
                'first_name' => 'Jeff', 
                'last_name' => 'Malak', 
                'city' => 'Milwaukee', 
                'state' => 'WI', 
                'phone' => '409-123-1234', 
                'points' => 150, 
                'role' => 'super_admin', 
                'valid_license' => 1 
            ]
        );
        
        User::create(
            [ 
                'player_name' => 'Author', 
                'email' => 'author@author.com', 
                'password' => Hash::make('user123'), 
                'first_name' => 'Test', 
                'last_name' => 'Test', 
                'city' => 'Austin', 
                'state' => 'TX', 
                'phone' => '409-123-1234', 
                'points' => 110, 
                'role' => 'author', 
                'valid_license' => 0 
            ]
        );
    }
}
