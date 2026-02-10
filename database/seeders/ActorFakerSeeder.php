<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('actors')->insert([                
                'name' => substr($faker->firstName, 0, 30),                
                'surname' => substr($faker->lastName, 0, 30),                
                'birthdate' => $faker->date(),                
                'country' => substr($faker->country, 0, 30),                
                'img_url' => substr($faker->imageUrl(400, 400, 'people'), 0, 255),                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
