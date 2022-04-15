@extends('layouts.general')

@section('title', 'Rental')

@section('content')

<div class="container-sm">
    <h1>Rental Details: {{ $borrow['id'] }}</h1>

    <h2>Book</h2>
    <table class="table">
        <tr>
            <td>Title</td>
            <td>{{ $book['title'] }}</td>
        </tr>
        <tr>
            <td>Author(s)</td>
            <td>{{ $book['authors'] }}</td>
        </tr>
        <tr>
            <td>Release Date</td>
            <td>{{ $book['released_at']->format('d/m/Y') }}</td>
        </tr>
    </table>

    <h2>Rental</h2>
    <table class="table">
        <tr>
            <td>Reader</td>
            <td>{{ $reader['name'] }}</td>
        </tr>
        <tr>
            <td>Requested at</td>
            <td>{{ $borrow['created_at']->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $borrow['status'] }}</td>
        </tr>
        <tr>
            <td>Deadline</td>            
            <td class="{{ $expired ? 'text-danger' : '' }}">
                @if ($borrow['deadline'])
                {{ $borrow['deadline']->format('d/m/Y') }}
                @endif
            </td>            
        </tr>
    </table>

    <h2>Events</h2>
    <table class="table">
        <thead>
            <td>Event</td>
            <td>Date</td>
            <td>Managed by</td>
        </thead>

        @if ($borrow['status'] != 'PENDING')
        <tr>
            <td>Processed</td>
            <td>{{ $borrow['request_processed_at']->format('d/m/Y') }}</td>
            <td>{{ $borrow->request_manager['name'] }}</td>
        </tr>
        @endif

        @if ($borrow['status'] == 'RETURNED')
        <tr>
            <td>Returned</td>
            <td>{{ $borrow['returned_at']->format('d/m/Y') }}</td>
            <td>{{ $borrow->return_manager['name'] }}</td>
        </tr>
        @endif

    </table>
</div>

@endsection