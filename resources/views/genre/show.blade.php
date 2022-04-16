@extends('layouts.general')

@section('title', 'Genre: ' . $genre['name'])

@section('content')

<div class="container-sm">
    <h2>Genre: {{ $genre['name'] }}</h2>
</div>

@include('components.booklist', [ 'books' => $genre->books ])

@endsection