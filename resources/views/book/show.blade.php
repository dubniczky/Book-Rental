@extends('layouts.general')

@section('title', 'Books')

@section('content')

<div class="container-sm">
    <div class="row">
        <div class="col-xl-5 p-3">
            <img src={{ URL::asset( $book['cover_image'] ) }} class="card-img" alt={{ URL::asset( $book['title'] ) }}>
        </div>
        <div class="col-xl-5 p-3">
            <h1>{{ $book['title'] }}</h1>
            <hr>

            <h4>by: {{ $book['authors'] }}</h4>

            @include('components.genrelist', ['genres' => $book->genres])
            
            <h5 class="mt-4"> Details:</h5>
            <table class="table">
                <tr>
                    <td>Release Date:</td>
                    <td>{{ $book['released_at']->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Pages:</td>
                    <td>{{ $book['pages'] }}</td>
                </tr>
                <tr>
                    <td>Language:</td>
                    <td>{{ $book['language_code'] }}</td>
                </tr>
                <tr>
                    <td>ISBN:</td>
                    <td>{{ $book['isbn'] }}</td>
                </tr>
            </table>

            <div class="badge bg-{{ $available == 0 ? 'danger' : 'success' }}">
                Available: {{ $available }} / {{ $book['in_stock'] }}
            </div>

            <p class="text-justify mt-5">
                {{ $book['description'] }}
            </p>
        </div>
    </div>
</div>

@endsection