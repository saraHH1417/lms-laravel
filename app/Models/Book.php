<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "topic",
        "description",
        "category_id",
        "author_id",
        "create_at",
        "updated_at"
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

}
