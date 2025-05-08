<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@upi.edu',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'username' => 'dosen',
                'email' => 'dosen@upi.edu',
                'password' => bcrypt('dosen'),
                'role' => 'dosen',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
