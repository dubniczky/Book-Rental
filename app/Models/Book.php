<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

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
}
