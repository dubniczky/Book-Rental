<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    static function get_validator() {
        return [
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'released_at' => 'required|date|before:now',
            'pages' => 'required|integer|gt:0',
            'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'description' => 'present',
            'genres' => 'required|array',
            'in_stock' => 'required|integer|gte:0',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $books = null;
        if ($req->input('q')) {
            $search = $req->input('q');
            $books = Book::where(function ($query) use($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('author', 'like', '%' . $search . '%');
            })->get();
        }
        else {
            $books = Book::all();
        }
        
        return view('book.list', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('book.create', [
            'genres' => Genre::all(),
            'init' => function($name) {
                return old($name);
            }
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //error_log($request);
        $this->authorize('create', Book::class);
        // https://laravel.com/docs/9.x/validation
        $val = $request->validate(BookController::get_validator());

        error_log( print_r($val, TRUE) );

        
        $book = Book::create($val);
        $book['cover_img'] = 'images/sample.png';
        $book->save();
        //error_log($book);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $user = Auth::user();
        return view('book.show', [
            'book' => $book,
            'available' => $book->available_count(),
            'user' => $user,
            'status' => $user ? Borrow::active_user_book($user, $book) : false
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize('update', Book::class);

        return view('book.edit', [
            'genres' => Genre::all(),
            'id' => $book['id'],
            'init' => function($name) use ($book) {
                return $book[$name];
            }
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->authorize('update', Book::class);
        $val = $request->validate(BookController::get_validator());

        $book->update($val);
        $book->save();

        return redirect()->route('book.show', ['book' => $book['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', Book::class);
        $book->delete();
        return redirect('/');
    }
}
