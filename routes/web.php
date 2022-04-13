<?php

use App\Http\Controllers\BookController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;

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
    $users = User::count();
    $books = Book::count();
    $genres = Genre::count();

    return view('index', [
        'users' => $users,
        'books' => $books,
        'genres' => $genres
    ]);
});

Route::resource('books', BookController::class);
Route::resource('genres', BookController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
