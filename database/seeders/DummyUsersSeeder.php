<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
                'name' => 'admin',
                'username' => 'Mas Admin',
                'email' => 'admin@gmail.com',
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/190221_%EC%A7%80%ED%9A%A8%EC%83%9D%EC%9D%BC%EA%B8%B0%EB%85%90.jpg/800px-190221_%EC%A7%80%ED%9A%A8%EC%83%9D%EC%9D%BC%EA%B8%B0%EB%85%90.jpg',
                'role' => 'admin',
                'password' => bcrypt('admin123')
            ],
        ];

        foreach ($userData as $val) {
            User::create($val);
        }
    }
}
