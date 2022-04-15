<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Borrow;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    $user_count = User::count();
    $book_count = Book::count();
    $genre_count = Genre::count();
    $accepted_borrow_count = Borrow::active_rentals()->count();
    $genres = Genre::all();

    return view('index', [
        'user_count' => $user_count,
        'book_count' => $book_count,
        'genre_count' => $genre_count,
        'accepted_borrow_count' => $accepted_borrow_count,
        'genres' => $genres
    ]);
});

Route::resource('books', BookController::class);
Route::resource('genres', GenreController::class);
Route::resource('borrows', BorrowController::class);

Route::get('/user/rentals', function() {
    $user = Auth::user();

    $b_pending = Borrow::where('reader_id', $user['id'])->
                         where('status', 'PENDING')->
                         get();

    $b_intime = Borrow::where('reader_id', $user['id'])->
                        where('status', 'ACCEPTED')->
                        where('deadline', '>=', now())->
                        get();

    $b_overdue = Borrow::where('reader_id', $user['id'])->
                         where('status', 'ACCEPTED')->
                         where('deadline', '<', now())->
                         get();

    $b_rejected = Borrow::where('reader_id', $user['id'])->
                          where('status', 'REJECTED')->
                          get();

    $b_returned = Borrow::where('reader_id', $user['id'])->
                          where('status', 'RETURNED')->
                          get();

    return view('borrow.user', [
        'b_pending' => $b_pending,
        'b_intime' => $b_intime,
        'b_overdue' => $b_overdue,
        'b_rejected' => $b_rejected,
        'b_returned' => $b_returned,
    ]);
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
