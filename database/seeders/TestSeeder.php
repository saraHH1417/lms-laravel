<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;
use function Illuminate\Events\queueable;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = [
            "name" => "Mysql",
            "topic" => "دیتابیس",
            "course_id" => "1",
        ];

        for ($i = 0; $i < 10; $i++) {
            Test::create($test);
        }
    }
}
