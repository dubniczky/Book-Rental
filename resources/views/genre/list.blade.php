@extends('layouts.general')
@section('title', 'Genres')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">Genres</h1>

    <table class="table">
        <thead>
            <td>Name</td>
            <td>Syle</td>
            <td>Details</td>
            <td>Delete</td>
        </thead>
        @foreach ($genres as $g)
        <tr>
            <td>{{$g['name']}}</td>
            <td>{{$g['style']}}</td>
            <td><a class="btn btn-primary" href="/genres/{{$g['name']}}/edit">edit</a></td>
            <td>
                <form action="{{ route('genres.destroy', ['genre'=>$g['id']]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection