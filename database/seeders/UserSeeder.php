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
            for ($i =0; $i < 10; $i++) {
                $user = ['name' => 'زهرا', 'email' => "adminn${i}@example.com", 'password' => bcrypt('123'), 'remember_token' => ''];
                User::create($user);
                $id++;
            }
        } catch (QueryException $ssception) {

        }
    }
}
