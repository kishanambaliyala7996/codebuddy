<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'is_admin'=>'1',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
