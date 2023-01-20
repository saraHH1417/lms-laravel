<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = [
            "name" => "دیتابیس های رابطه ای",
            "topic" => "دیتابیس",
            "description" => "مشخص نشده",
            "course_id" => "1",
        ];

        $book = [
            "name" => "دیتابیس های رابطه ای",
            "topic" => "دیتابیس",
            "description" => "مشخص نشده",
            "author_id" => "1",
        ];


        for ($i = 0; $i < 10; $i++) {
            Lesson::create($lesson);
            Book::create($book);
        }
    }
}
