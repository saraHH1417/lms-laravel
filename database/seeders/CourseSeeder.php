<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [
            "name" => "برنامه نویسی",
            "price" => 21,
            "description" => "مشخص نشده",
            "category_id" => 1
        ];
        for ($i =0; $i < 10; $i++) {
            Course::create($course);
        }
    }
}
