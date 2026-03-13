<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    private const ALLOWED_DECADES = [1980, 1990, 2000, 2010, 2020];

    /**
     * List all actors
     */
    public function listActors()
    {
        $actors = Actor::all();
        $title = 'Listado de Actores';

        return view('actors.list', ['actors' => $actors, 'title' => $title]);
    }

    /**
     * List actors by decade based on birthdate.
     */
    public function listActorsByDecade(Request $request, ?int $year = null)
    {
        $startYear = $year ?? (int) $request->input('year');

        if (!$startYear || !in_array($startYear, self::ALLOWED_DECADES, true)) {
            return redirect('/')->with('error', 'La decada debe estar entre 1980 y 2020 en saltos de 10.');
        }

        $endYear = $startYear + 9;

        $actors = Actor::whereYear('birthdate', '>=', $startYear)
            ->whereYear('birthdate', '<=', $endYear)
            ->get();

        $title = "Actores nacidos en la decada de {$startYear}-{$endYear}";

        return view('actors.list', ['actors' => $actors, 'title' => $title, 'selectedDecade' => $startYear]);
    }
}
