@extends('layouts.master')

@section('title', 'Movies List')

@section('content')
    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/filmsByYear>Pelis por año</a></li>
        <li><a href=/filmout/filmsByGenre>Pelis por género</a></li>
        <li><a href=/filmout/countFilms>Contar pelis</a></li>
        <li><a href=/filmout/sortFilmsByYear>Ordenar pelis por año</a></li>
    </ul>
@endsection
