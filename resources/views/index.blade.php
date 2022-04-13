@extends('layouts.general')

@section('title', 'Index Test')

@section('content')
    Users <strong>{{ $user_count }}</strong> <br>
    Books <strong>{{ $book_count }}</strong> <br>
    Genres <strong>{{ $genre_count }}</strong> <br>
    Active rentals <strong>{{ $accepted_borrow_count }}</strong> <br>

@endsection