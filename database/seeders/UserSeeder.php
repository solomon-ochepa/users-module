<?php

namespace Modules\User\database\seeders;

use Modules\User\app\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = '$1Password;';

        $users = [
            [
                'first_name'    => 'Admin',
                'last_name'     => 'User',
                'username'      => 'admin',
                'phone'         => '2340000000000',
                'email'         => 'admin@example.com',
                'password'      => Hash::make($password),
            ],
            [
                'first_name'    => 'Demo',
                'last_name'     => 'User',
                'username'      => 'user',
                'phone'         => '2340000000001',
                'email'         => 'user@example.com',
                'password'      => Hash::make($password),
            ],
        ];

        foreach ($users as $user) {
            $exists = User::whereUsername($user['username'])->count();
            if (!$exists) {
                $user = User::firstOrCreate(['username' => $user['username']], $user); // Create User
            }
        }
    }
}
