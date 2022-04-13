<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'style'
    ];

    public function books() {
        return $this->belongsToMany(Book::class);
    }

    public static function find_by_name($name) {
        return Genre::query()->where('name', '=', $name)->first();
    }
}
