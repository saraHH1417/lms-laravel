<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $user = ['name' => 'زهرا', 'email' => "admin@example.com", 'password' => bcrypt('123'), 'remember_token' => ''];
            User::create($user);
        } catch (QueryException $exception) {

        }
    }
}
