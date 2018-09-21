<?php

use Illuminate\Database\Seeder;

class DataDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $id = Ticket::all()->pluck('id')->toArray();
        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            
            \App\Models\Ticket::insert([ 
            	'user_id' => '7', //input manual sesuai id USER
	            'position_name' => ucwords($faker->position_name),
	            'location' => ucwords($faker->location),
	            'position_grade' => $faker->grade,
            ]);

            $ticket_id = Ticket::select('id')->where([
	            ['position_name',ucwords($request->position_name)]
	        ])->first();


        }
    }
}
