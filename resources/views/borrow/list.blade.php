@extends('layouts.general')

@section('title', 'All Rentals')

@section('content')

<div class="container-sm">
    <h1 class="mt-4">All Rentals</h1>

    <h2 class="mt-5">Pending</h2>
    @include('components.borrowlist', [ 'borrows' => $b_pending ])

    <h2 class="mt-5">In-time</h2>
    @include('components.borrowlist', [ 'borrows' => $b_intime ])

    <h2 class="mt-5">Overdue</h2>
    @include('components.borrowlist', [ 'borrows' => $b_overdue ])

    <h2 class="mt-5">Rejected</h2>
    @include('components.borrowlist', [ 'borrows' => $b_rejected ])

    <h2 class="mt-5">Returned</h2>
    @include('components.borrowlist', [ 'borrows' => $b_returned ])
    
</div>

@endsection