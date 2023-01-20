<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            "name" => "موضوعات فنی"
        ];
        for ($i =0; $i < 10; $i++) {
            Category::create($category);
        }
    }
}
