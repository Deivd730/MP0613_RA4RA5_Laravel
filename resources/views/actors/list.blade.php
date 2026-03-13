@extends('layouts.master')

@section('title', $title ?? 'Lista de Actores')

@section('content')
    <h1>{{ $title ?? 'Lista de Actores' }}</h1>

    @if (isset($selectedDecade))
        <p class="text-muted">Decada seleccionada: {{ $selectedDecade }} - {{ $selectedDecade + 9 }}</p>
    @endif

    @if ($actors->isEmpty())
        <div class="alert alert-danger">No se ha encontrado ningún actor</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>País</th>
                        <!-- <th>Imagen</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actors as $actor)
                        <tr>
                            <td>{{ $actor->id }}</td>
                            <td>{{ $actor->name }}</td>
                            <td>{{ $actor->surname }}</td>
                            <td>{{ $actor->birthdate->format('d/m/Y') }}</td>
                            <td>{{ $actor->country }}</td>
                            <!-- <td><img src="{{ $actor->img_url }}" style="width: 100px; height: 120px;" alt="{{ $actor->name }}" /></td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-3">
        <a href="/" class="btn btn-secondary">Volver al inicio</a>
    </div>
@endsection
