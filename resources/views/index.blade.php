@extends('layouts.general')

@section('title', 'Index Test')

@section('content')

{{-- https://getbootstrap.com/docs/5.0/layout/containers/ --}}
<div class="container-sm">
    <h2>Stats:</h2>
    <div class="list-group">

        <span class="list-group-item list-group-item-primary">
            Users: <strong>{{ $user_count }}</strong>
        </span>
        <span class="list-group-item list-group-item-secondary">
            Books: <strong>{{ $book_count }}</strong>
        </span>
        <span class="list-group-item list-group-item-primary">
            Genres: <strong>{{ $genre_count }}</strong>
        </span>
        <span class="list-group-item list-group-item-secondary">
            Acrive Rentals: <strong>{{ $accepted_borrow_count }}</strong>
        </span>

    </div>

    <h2>Genres:</h2>
    <div class="list-inline">
        @foreach ($genres as $g)
        <a class="btn btn-outline-{{ $g['style'] }}"
           href="{{ route('genres.show', ['genre'=>$g['id']]) }}">
           {{ $g['name'] }}
        </a>
        @endforeach
    </div>

    <h2>Search:</h2>
    <form action="{{ route('books.index') }}">
        <input type="text" name="q" class="form-control">
        <input type="submit" class="form-control" value="Search">
    </form>
</div>

@endsection