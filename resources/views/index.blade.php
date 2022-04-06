@extends('layouts.general')

@section('title', 'Index Test')

@section('content')
    Users <strong>{{ $users }}</strong> <br>
    Books <strong>{{ $books }}</strong>

@endsection