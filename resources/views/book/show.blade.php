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

            {{-- User Menu --}}
            @if ($user && !$user['is_librarian'])
                @if ($status)
                <p>You have an active rental for this book.</p>
                <a onclick="alert('You already have a rental for this book!')" class="btn btn-primary">Rent</a>
                @else
                <p>You have no current rental for this book.</p>
                <a href="/borrows/create?book={{ $book['id'] }}" class="btn btn-primary">Rent</a>
                @endif
            @endif

            {{-- Librarian Menu --}}
            @if ($user && $user['is_librarian'])
                <a href="/books/{{ $book['id'] }}/edit" class="btn btn-primary">Edit</a>
                <form action="{{ route('books.destroy', ['book'=>$book['id']]) }}" method="POST">
                    @csrf
                    @method('delete') {{-- ?? --}}
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <p class="text-justify mt-5">
                {{ $book['description'] }}
            </p>
        </div>
    </div>
</div>

@endsection