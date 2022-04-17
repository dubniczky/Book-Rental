@extends('layouts.general')
@section('title', 'Create new genre')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">Create New Genre</h1>

    <form action="/genres" method="POST">
        @csrf

        @include('genre.form', ['init'=>$init, 'options'=>$styles])

        <div class="mt-3">
            <input type="submit" class="btn btn-success" value="Add Book">
            <input type="reset" class="btn btn-danger" value="Reset">
        </div>        
    </form>
</div>

@endsection