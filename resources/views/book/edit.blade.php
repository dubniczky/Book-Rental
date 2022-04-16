@extends('layouts.general')
@section('title', 'Edit Book')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">Edit Book</h1>
    <form action="/books/{{$id}}" method="PATCH">
        @csrf

        @include('book.form', ['genres' => $genres, 'init'=>$init])

        <input type="submit" class="btn btn-success" value="Save">
        <input type="reset" class="btn btn-danger" value="Cancel">
    </form>
</div>

@endsection