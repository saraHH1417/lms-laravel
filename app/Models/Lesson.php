<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "topic",
        "description",
        "course_id",
        "created_at",
        "update_at"
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }


    public function test() {
        return $this->hasOne(Test::class);
    }
}
