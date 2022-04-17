@extends('layouts.general')
@section('title', 'Edit genre')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">Edit Genre</h1>

    <form action="/genres/{{$id}}" method="post">
        @csrf
        @method('patch')

        @include('genre.form', ['init'=>$init, 'options'=>$styles])

        <div class="mt-3">
            <input type="submit" class="btn btn-success" value="Save">
            <input type="reset" class="btn btn-danger" value="Reset">
        </div>        
    </form>
</div>

@endsection