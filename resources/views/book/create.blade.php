@extends('layouts.general')
@section('title', 'Create Book')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">Add a New Book</h1>
    <form action="/books" method="POST">
        @csrf

        @include('book.form', ['genres' => $genres, 'init'=>$init])

        <input type="submit" class="btn btn-success" value="Add Book">
        <input type="reset" class="btn btn-danger" value="Reset">
    </form>
</div>

@endsection