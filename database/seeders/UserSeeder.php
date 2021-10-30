<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create(
            [
                'name' => 'test1',
                'email' => 'test1@test.com',
                'password' => bcrypt('5ecret*!'),
                'role_id' => 1
            ],
        );
        User::create(
            [
                'name' => 'test2',
                'email' => 'test2@test.com',
                'password' => bcrypt('5ecret*@'),
                'role_id' => 1
            ],
        );
        User::create(
            [
                'name' => 'test3',
                'email' => 'test3@test.com',
                'password' => bcrypt('5ecret*#'),
                'role_id' => 1
            ],
        );
    }
}
