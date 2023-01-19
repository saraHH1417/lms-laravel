<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "description",
        "category_id",
        "created_at",
        "update_at"
    ];


    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function reviews() {
        return $this->hasMany(Course::class);
    }

    public function test() {
        return $this->hasOne(Test::class);
    }

}
