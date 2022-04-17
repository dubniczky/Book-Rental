<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

use App\Models\Borrow;
use App\Models\Book;

class BorrowController extends Controller
{
    static function get_validator() {
        return [
            'status' => [
                Rule::in(BorrowController::$states),
            ],
            'deadline' => "date"
        ];
    }

    static $states = [
        'PENDING',
        'ACCEPTED',
        'REJECTED',
        'RETURNED'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAll', Borrow::class);

        $b_pending = Borrow::where('status', 'PENDING')->get();

        $b_intime = Borrow::where('status', 'ACCEPTED')->
                            where('deadline', '>=', now())->
                            get();

        $b_overdue = Borrow::where('status', 'ACCEPTED')->
                             where('deadline', '<', now())->
                             get();

        $b_rejected = Borrow::where('status', 'REJECTED')->
                              get();

        $b_returned = Borrow::where('status', 'RETURNED')->
                              get();

        return view('borrow.list', [
            'b_pending' => $b_pending,
            'b_intime' => $b_intime,
            'b_overdue' => $b_overdue,
            'b_rejected' => $b_rejected,
            'b_returned' => $b_returned,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $user = Auth::user();
        if (!$user) {
            return abort(403);
        }

        $book_id = $req->input('book');
        if (!$book_id) {
            return abort(400);
        }

        $book = Book::find($book_id);
        if (!$book) {
            return abort(404);
        }

        if (Borrow::active_user_book($user, $book)) {
            return abort(403);
        }

        $borrow = Borrow::create([
            'reader_id' => $user['id'],
            'book_id' => $book_id,
            'status' => 'PENDING'
        ]);
        $borrow->save();

        return redirect("/books/" . $book_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowRequest $req)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        $user = Auth::user();
        if (!$user['is_librarian'] && $user['id'] != $borrow['reader_id']) {
            return abort(403);
        }

        //error_log(print_r($borrow, TRUE));

        return view('borrow.show', [
            'borrow' => $borrow,
            'book' => $borrow->book,
            'reader' => $borrow->reader,
            'expired' => ($borrow['deadline']) ? $borrow['deadline']->isPast() : false,
            'user' => $user,
            'init' => function($name) use ($borrow) {
                if (Borrow::is_date_property($name)) {
                    return ($borrow[$name]) ? $borrow[$name]->format('Y-m-d') : '';
                }
                return $borrow[$name];
            }
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowRequest  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowRequest $request, Borrow $borrow)
    {
        $this->authorize('update', Borrow::class);
        $user = Auth::user();
        $val = $request->validate(BorrowController::get_validator());

        // Update deadline
        if (isset($val['deadline'])) {
            $borrow['deadline'] = $val['deadline'];
        }

        // Update state
        if (isset($val['status'])) {
            //Updated from pending
            if ($borrow['status'] == 'PENDING' && $borrow['status'] != $val['status'] ) {
                $borrow['status'] = $val['status'];
                $borrow['request_processed_at'] = now();
                $borrow['request_managed_by'] = $user['id'];
            }
            //Updated to returned
            else if ($borrow['status'] != 'RETURNED' && $val['status'] == 'RETURNED' ) {
                $borrow['status'] = 'RETURNED';
                $borrow['returned_at'] = now();
                $borrow['return_managed_by'] = $user['id'];
            }
            else
            {
                $borrow['status'] = $val['status'];
            }
        }        

        $borrow->save();

        return redirect()->route('borrows.show', ['borrow' => $borrow['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
