<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Films extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'name' => 'La Rosa Púrpura del Cairo',
                'year' => 1985,
                'genre' => 'Drama',
                'img_url' => 'https://es.web.img2.acsta.net/medias/nmedia/18/79/45/34/20253823.jpg',
                'country' => 'Spain',
                'time' => 85,
            ],
            [
                'name' => 'El Club de los Cinco',
                'year' => 1985,
                'genre' => 'Comedia',
                'img_url' => 'https://pics.filmaffinity.com/El_club_de_los_cinco-192309838-large.jpg',
                'country' => 'Spain',
                'time' => 85,
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
