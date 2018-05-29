<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ValueObjects\LeadStatus;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach (range(10,30) as $index) {
	        DB::table('leads')->insert([
	            'name' => $faker->name,
	            'status' => $faker->numberBetween(0,2),
	            'contacts' => json_encode([
	            	[
	            		'mean_of_contact' => 'Email',
	            		'value' => $faker->email
	            	]
	            ]),
	            'comments' => json_encode([]),
	            'created_at' => Carbon::now(),
	        ]);
		}

		DB::table('users')->insert([
			'name' => 'Walter Galvão',
			'email' => 'wbgneto@hotmail.com',
			'password' => bcrypt('123456'),
		]);
    }
}
