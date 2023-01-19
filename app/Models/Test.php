<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
      "name",
      "topic",
      "course_id",
      "created_at",
      "updated_at"
    ];


    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function courses() {
        return $this->hasMany(Test::class);
    }


}
