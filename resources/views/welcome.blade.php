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

    <h2 class="mt-4">Añadir Película</h2>

    <form action="{{ route('createFilm') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Género</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">País</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Duración (min)</label>
            <input type="number" class="form-control" id="time" name="time" required>
        </div>
        <div class="mb-3">
            <label for="img_url" class="form-label">URL Imagen</label>
            <input type="url" class="form-control" id="img_url" name="img_url" required>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
@endsection
