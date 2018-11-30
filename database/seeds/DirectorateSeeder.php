<?php

use Illuminate\Database\Seeder;

class DirectorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Directorate::insert([
        	[
        		'id' =>1 ,
        		'directorate_name' => 'Office Of President Director'
        	],
        	[
        		'id' =>2 ,
        		'directorate_name' => 'Office Of Chief Strategy Experience'
        	],
        	[
        		'id' =>3 ,
        		'directorate_name' => 'Office Of Director & Chief Human Resources'

        	],
        	[
        		'id' => 4,
        		'directorate_name' =>'Office Of Director & Chief Financial'

        	],
        	[
        		'id' => 5,
        		'directorate_name' =>'Office Of Chief Corporate Services'

        	],
        	[
        		'id' => 6,
        		'directorate_name' =>'Director & Chief Operating Officer'

        	],
        	[
        		'id' => 7,
        		'directorate_name' =>'Office Of Chief Marketing'

        	],
        	[
        		'id' => 8,
        		'directorate_name' =>'Office Of Director & Chief Sales And Distribution'

        	],
        	[
        		'id' => 9,
        		'directorate_name' =>'Office Of Director & Chief Business'

        	],
        	[
        		'id' => 10,
        		'directorate_name' =>'Office Of Chief Technology & Information Officer'

        	]
        ]);
    }
}
