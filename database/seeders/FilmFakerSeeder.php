<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => substr($faker->sentence(3), 0, 100),
                'year' => $faker->year,
                'genre' => substr($faker->word, 0, 50),
                'country' => substr($faker->country, 0, 30),
                'duration' => $faker->numberBetween(60, 200),
                'img_url' => substr($faker->imageUrl(640, 480, 'movies'), 0, 255),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
