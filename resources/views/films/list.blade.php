@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    @if (empty($films))
        <div class="alert alert-danger">No se ha encontrado ninguna película</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        @foreach ($films as $film)
                            @foreach (array_keys($film) as $key)
                                <th>{{ $key }}</th>
                            @endforeach
                        @break
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td>{{ $film['name'] }}</td>
                        <td>{{ $film['year'] }}</td>
                        <td>{{ $film['genre'] }}</td>
                        <td><img src="{{ $film['img_url'] }}" style="width: 100px; height: 120px;" /></td>
                        <td>{{ $film['country'] }}</td>
                        <td>{{ $film['time'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
