@extends('layouts.general')

@section('title', 'Index Test')

@section('content')

{{-- https://getbootstrap.com/docs/5.0/layout/containers/ --}}
<div class="container-sm">
    <h2 class="mt-5">Stats:</h2>
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

    <h2 class="mt-5">Genres:</h2>
    @include('components.genrelist', ['genres' => $genres])

    <h2 class="mt-5">Search:</h2>
    <form action="{{ route('books.index') }}">
        <input type="text" name="q" class="form-control">
        <input type="submit" class="form-control" value="Search">
    </form>
</div>

@endsection