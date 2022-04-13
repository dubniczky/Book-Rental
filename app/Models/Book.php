<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'authors',
        'description',
        'released_at',
        'pages',
        'isbn',
        'in_stock',
    ];

    protected $casts = [
        'released_at' => 'date',
        'pages' => 'integer',
        'in_stock' => 'integer',
    ];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    public function borrows() {
        return $this->hasMany(Borrow::class);
    }

    public function available_count() {
        return $this->hasMany(Borrow::class)->where('status', '=', 'ACCEPTED')->count();
    }
}
