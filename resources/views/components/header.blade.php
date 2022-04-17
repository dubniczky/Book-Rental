<!-- Header -->
@php ($user = Illuminate\Support\Facades\Auth::user())
@php ($is_libr = ($user) ? $user['is_librarian'] : false)

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookRent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/books">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/genres">Genres</a>
            </li>

            @if($user)
            <li class="nav-item">
                <a class="nav-link" href="/user/rentals">My Rentals</a>
            </li>
            @endif

            @if($is_libr)
            <li class="nav-item">
                <a class="nav-link" href="/books/create">Add Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/genres/create">Add Genre</a>
            </li>
            @endif
        </ul>

        @if($user)
        <a class="btn btn-primary" href="/logout">Logout</a>
        @else
        <a class="btn btn-primary" href="/login">Login</a>
        @endif
    </div>
    </div>
</nav>
<!-- /Header -->