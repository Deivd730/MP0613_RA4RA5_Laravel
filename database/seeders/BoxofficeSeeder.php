<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BoxofficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all film IDs from the films table
        $filmIds = DB::table('films')->pluck('id')->toArray();
        
        // If there are no films, create some sample data first
        if (empty($filmIds)) {
            return;
        }
        
        // Create boxoffice records for each film
        foreach ($filmIds as $filmId) {
            // Generate 1-3 records per film with random earnings
            $recordCount = $faker->numberBetween(1, 3);
            
            for ($i = 0; $i < $recordCount; $i++) {
                $dateRecorded = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
                
                DB::table('boxoffices')->insert([
                    'film_id' => $filmId,
                    'earnings' => $faker->numberBetween(100000, 500000000) + $faker->randomFloat(2, 0, 99),
                    'currency' => $faker->randomElement(['USD', 'EUR', 'GBP', 'JPY']),
                    'date_recorded' => $dateRecorded,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}