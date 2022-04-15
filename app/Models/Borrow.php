<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'book_id',
        'status'
    ];

    protected $casts = [
        'request_processed_at' => 'date',
        'returned_at' => 'date',
        'deadline' => 'date',
    ];

    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function reader() {
        return $this->belongsTo(User::class, 'reader_id');
    }

    public function request_manager() {
        return $this->belongsTo(User::class, 'request_manager_id');
    }

    public function return_manager() {
        return $this->belongsTo(User::class, 'return_manager_id');
    }

    public static function active_rentals() {
        return Borrow::where('status', '=', 'ACCEPTED');
    }

    public static function active_user_book($user, $book) {
        $borrow = Borrow::where('reader_id', $user['id'])->
                          where('book_id', $book['id'])->
                          whereIn('status', ['ACCEPTED','PENDING'])->first();
        return !!$borrow;
    }
}
