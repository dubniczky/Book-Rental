<?php

use App\Http\Controllers\BookController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    return view('index', [
        'user_count' => $user_count,
        'book_count' => $book_count,
        'genre_count' => $genre_count,
        'accepted_borrow_count' => $accepted_borrow_count
    ]);
});

Route::resource('books', BookController::class);
Route::resource('genres', BookController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
