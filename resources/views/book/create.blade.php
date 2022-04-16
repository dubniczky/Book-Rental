@extends('layouts.general')
@section('title', 'Create Book')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">Add a New Book</h1>
    <form action="/books" method="POST">
        @csrf

        @include('book.formfield', [ 'title'=>'Title', 'name'=>'title', 'type'=>'text' ])
        @include('book.formfield', [ 'title'=>'Authors', 'name'=>'authors', 'type'=>'text' ])
        @include('book.formfield', [ 'title'=>'Release Date', 'name'=>'released_at', 'type'=>'date' ])
        @include('book.formfield', [ 'title'=>'Pages', 'name'=>'pages', 'type'=>'number' ])
        @include('book.formfield', [ 'title'=>'ISBN', 'name'=>'isbn', 'type'=>'text' ])

        @include('book.formarea', [ 'title'=>'description', 'name'=>'description' ])
        @include('book.formgenres', [ 'genres'=>$genres ])

        @include('book.formfield', [ 'title'=>'In Stock', 'name'=>'in_stock', 'type'=>'number' ])

        <input type="submit" class="btn btn-success" value="Add Book">
        <input type="reset" class="btn btn-danger" value="Reset">
    </form>
</div>

@endsection