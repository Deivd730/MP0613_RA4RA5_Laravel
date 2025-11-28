<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');

        return $films;
    }

    /**
     * List films older than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year)) {
            $year = 2000;
        }

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year) {
                $old_films[] = $film;
            }
        }

        return view('films.list', ['films' => $old_films, 'title' => $title]);
    }

    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year)) {
            $year = 2000;
        }

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year) {
                $new_films[] = $film;
            }
        }

        return view('films.list', ['films' => $new_films, 'title' => $title]);
    }

    /**
     * List films filtered by year
     */
    public function listFilmsByYear($year = null)
    {
        $films_filtered = [];
        $title = 'Listado de todas las pelis';
        $films = FilmController::readFilms();

        // Si no se pasa año, devolvemos la lista tal cual (sin ordenar)
        if (is_null($year)) {
            return view('films.list', ['films' => $films, 'title' => $title]);
        }

        // Solo filtramos
        $title = 'Listado de todas las pelis filtrado x año';

        foreach ($films as $film) {
            if ($film['year'] == $year) {
                $films_filtered[] = $film;
            }
        }

        return view('films.list', ['films' => $films_filtered, 'title' => $title]);
    }

    public function listFilmsByGenre($genre = null)
    {
        $films_filtered = [];
        $title = 'Listado de todas las pelis';
        $films = FilmController::readFilms();

        // Si no se pasa género, devolvemos la lista tal cual (sin ordenar)
        if (is_null($genre)) {
            return view('films.list', ['films' => $films, 'title' => $title]);
        }

        // Solo filtramos
        $title = 'Listado de todas las pelis filtrado x categoria';

        foreach ($films as $film) {
            if (strtolower($film['genre']) == strtolower($genre)) {
                $films_filtered[] = $film;
            }
        }

        return view('films.list', ['films' => $films_filtered, 'title' => $title]);
    }

    public function countFilms()
    {

        $films = FilmController::readFilms();

        $count = count($films);

        $title = 'Contador de Películas';

        return view('films.count', ['count' => $count, 'title' => $title]);
    }
    
    //Funcion para ordenar por año
    public function sortFilmsByYear()
    {
        $films = FilmController::readFilms();
        usort($films, function ($a, $b) {
            return $a['year'] <=> $b['year'];
        });
        $title = "Listado de pelis ordenadas por año";
        return view('films.list', ['films' => $films, 'title' => $title]);
    }
}
