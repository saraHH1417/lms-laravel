<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question= [
            "question" => "انجین های mysql را نام ببرید",
            "answer" => "my isam , innodb",
            "test_id" =>"1",
        ];

        for ($i = 0; $i < 10; $i++) {
            Question::create($question);
        }
    }
}
