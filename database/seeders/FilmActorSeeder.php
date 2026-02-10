<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $filmIds = DB::table('films')->pluck('id');
        $actorIds = DB::table('actors')->pluck('id');

        foreach ($filmIds as $filmId) {
            $randomActors = $actorIds->random(rand(1, 3));

            foreach ($randomActors as $actorId) {
                DB::table('films_actors')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
