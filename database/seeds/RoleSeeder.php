<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
        	[
        		'id' => 1,
        		'nama_role' => 'Line Manager 1'
        	],
        	[
        		'id' => 2,
        		'nama_role' => 'Division Head'
        	],
            [
                'id' => 3,
                'nama_role' => 'Group Head'
            ],
            [
                'id' => 4,
                'nama_role' => 'Chief'
            ],
        	[
        		'id' => 5,
        		'nama_role' => 'HR Business Partner'
        	],
            [
                'id' => 6,
                'nama_role' => 'HR Talent Acquistion'
            ],
            [
                'id' => 7,
                'nama_role' => 'HR Operation'
            ]
        ]);

    }
}
