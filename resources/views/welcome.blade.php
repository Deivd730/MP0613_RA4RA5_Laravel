@extends('layouts.master')

@section('title', 'Movies List')

@section('content')

    <style>
        .list-group-item a {
            text-decoration: none;
            color: #0d6efd;
        }

        .list-group-item a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="row">
        <div class="col-md-4">
            <h1 class="mt-4">Lista de Películas</h1>

            <ul class="list-group">
                <li class="list-group-item"><a href="/filmout/oldFilms">Pelis antiguas</a></li>
                <li class="list-group-item"><a href="/filmout/newFilms">Pelis nuevas</a></li>
                <li class="list-group-item"><a href="/filmout/filmsByYear">Pelis por año</a></li>
                <li class="list-group-item"><a href="/filmout/filmsByGenre">Pelis por género</a></li>
                <li class="list-group-item"><a href="/filmout/countFilms">Contar pelis</a></li>
                <li class="list-group-item"><a href="/filmout/sortFilmsByYear">Ordenar pelis por año</a></li>
            </ul>
        </div>

        <div class="col-md-8">
            <h2 class="mt-4">Añadir Película</h2>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card p-3 shadow-sm">
                <form action="{{ route('createFilm') }}" method="POST">
                    @csrf

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="year" class="form-label">Año</label>
                            <input type="number" class="form-control" id="year" name="year"  required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="genre" class="form-label">Género</label>
                            <input type="text" class="form-control" id="genre" name="genre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">País</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="time" class="form-label">Duración</label>
                            <input type="number" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="col-md-6">
                            <label for="img_url" class="form-label">URL Imagen</label>
                            <input type="text" class="form-control" id="img_url" name="img_url" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Añadir</button>
                </form>
            </div>
        </div>
    </div>

@endsection
