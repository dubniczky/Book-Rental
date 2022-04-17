@extends('layouts.general')
@section('title', 'User Profile')
@section('content')

<div class="container-sm">
    <h1 class="mt-5">My Profile</h1>

    <table class="table">
        <tr>
            <td>Name</td>
            <td>{{ $user['name'] }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user['email'] }}</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>{{ $user['is_librarian'] ? 'Librarian' : 'Reader' }}</td>
        </tr>
    </table>
</div>

@endsection