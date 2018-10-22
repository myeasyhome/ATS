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
        		'name' => 'user',
        		'nik' => 'user',
        		'email' => 'user@gmail.com',
        		'password' => bcrypt('hrdev'),
        	],
            [
                'id' => 2,
                'name' => 'dh',
                'nik' => 'dh',
                'email' => 'dh@gmail.com',
                'password' => bcrypt('hrdev'),
            ],
            [
                'id' => 3,
                'name' => 'gh',
                'nik' => 'gh',
                'email' => 'gh@gmail.com',
                'password' => bcrypt('hrdev'),
            ],
            [
                'id' => 4,
                'name' => 'chief',
                'nik' => 'chief',
                'email' => 'chief@gmail.com',
                'password' => bcrypt('hrdev'),
            ],
            [
                'id' => 5,
                'name' => 'hrbp',
                'nik' => 'hrbp',
                'email' => 'hrbp@gmail.com',
                'password' => bcrypt('hrdev'),
            ],
            [
                'id' => 6,
                'name' => 'hrta',
                'nik' => 'hrta',
                'email' => 'hrta@gmail.com',
                'password' => bcrypt('hrdev'),
            ],
            [
                'id' => 7,
                'name' => 'hro',
                'nik' => 'hro',
                'email' => 'hro@gmail.com',
                'password' => bcrypt('hrdev'),
            ]
        ]);
    }
}
