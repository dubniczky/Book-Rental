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
            <td>
                @if ($borrow['deadline'])
                {{ $borrow['deadline']->format('d/m/Y') }} {{ $expired ? '(OVERDUE)' : '' }}
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

    @if ($user['is_librarian'])
        <form action="/borrows/{{ $borrow['id'] }}" method="post">
            @csrf
            @method('patch')

            @include('components.dropdown', [
                'title'=>'Status',
                'name'=>'status',
                'init'=>$init,
                'options'=> ['PENDING','ACCEPTED','REJECTED','RETURNED']
            ])

            <span>
                <input type="submit" class="btn btn-success" value="Save">
                <input type="reset" class="btn btn-danger" value="Reset">
            </span>
            
        </form>

        <form action="/borrows/{{ $borrow['id'] }}" method="post">
            @csrf
            @method('patch')

            @include('components.formfield', [
                'title'=>'Deadline',
                'name'=>'deadline',
                'type'=>'date',
                'init'=>$init
            ])

            <span>
                <input type="submit" class="btn btn-success" value="Save">
                <input type="reset" class="btn btn-danger" value="Reset">
            </span>
            
        </form>
    @endif
</div>

@endsection