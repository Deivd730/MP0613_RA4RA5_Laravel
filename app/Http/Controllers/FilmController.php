<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Create films
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createFilm(Request $request)
    {
        if ($this->isFilm($request->input('name'))) {
            return back()->with('error', 'Film already exists');
        }

        // Validate year is between 1900 and 2024
        $year = (int) $request->input('year');
        if ($year < 1900 || $year > 2024) {
            return back()->with('error', 'Film year must be between 1900 and 2024');
        }

        $films = FilmController::readFilms();

        $newFilm = [
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'country' => $request->input('country'),
            'time' => $request->input('time'),
            'img_url' => $request->input('img_url'),
        ];

        // 3. Guardamos
        $films[] = $newFilm;
        Storage::put('/public/films.json', json_encode($films));

        return redirect()->route('listAll');
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

        if (is_null($year)) {
            return view('films.list', ['films' => $films, 'title' => $title]);
        }

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

        if (is_null($genre)) {
            return view('films.list', ['films' => $films, 'title' => $title]);
        }

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
        $title = 'Listado de pelis ordenadas por año';

        return view('films.list', ['films' => $films, 'title' => $title]);
    }

    public function listAllFilms()
    {
        $films = FilmController::readFilms();
        $title = 'Listado de todas las pelis';

        return view('films.list', ['films' => $films, 'title' => $title]);
    }

    public function isFilm(string $name)
    {
        if ($name === '') {
            return false;
        }

        $films = FilmController::readFilms();
        foreach ($films as $film) {
            if ($film['name'] === $name) {
                return true;
            }
        }

        return false;
    }
}
