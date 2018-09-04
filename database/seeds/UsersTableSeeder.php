<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
        	[
        		'id' => 1,
        		'nama' => 'denny',
        		'username' => 'denny',
        		'email' => 'denny@gmail.com',
        		'password' => bcrypt('hrdev'),
        		'role_id' => 1
        	],
            [
                'id' => 2,
                'nama' => 'line manager 2',
                'username' => 'lm2',
                'email' => 'lm2@gmail.com',
                'password' => bcrypt('hrdev'),
                'role_id' => 2
            ],
            [
                'id' => 3,
                'nama' => 'HR Bussiness Process',
                'username' => 'hrbp',
                'email' => 'hrbp@gmail.com',
                'password' => bcrypt('hrdev'),
                'role_id' => 3
            ],
            [
                'id' => 4,
                'nama' => 'HR Talent',
                'username' => 'hrt',
                'email' => 'hrt@gmail.com',
                'password' => bcrypt('hrdev'),
                'role_id' => 4
            ],
            [
                'id' => 5,
                'nama' => 'HR Operation',
                'username' => 'hro',
                'email' => 'hro@gmail.com',
                'password' => bcrypt('hrdev'),
                'role_id' => 5
            ],
            [
                'id' => 6,
                'nama' => 'candidate',
                'username' => 'candidate',
                'email' => 'candidate@gmail.com',
                'password' => bcrypt('hrdev'),
                'role_id' => 6
            ],
            [
                'id' => 7,
                'nama' => 'Line Manager 1',
                'username' => 'lm1',
                'email' => 'lm1@gmail.com',
                'password' => bcrypt('hrdev'),
                'role_id' => 1
            ]
        ]);
    }
}
