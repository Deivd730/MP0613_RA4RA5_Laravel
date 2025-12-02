@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    <div class="alert alert-primary" role="alert">
        Total de películas disponibles: <strong>{{ $count }}</strong>
    </div>
@endsection
