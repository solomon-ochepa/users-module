<?php

namespace Modules\User\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\User\app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin',
                'phone' => '23400000000000',
                'email' => 'admin@example.com',
                'password' => Hash::make('$1Password;'),
            ],
            [
                'first_name' => 'Demo',
                'last_name' => 'User',
                'username' => 'user',
                'phone' => '23400000000001',
                'email' => 'user@example.com',
                'password' => Hash::make('$1Password;'),
            ],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(Arr::only($data, ['username']), $data);

            // // @Todo: check if model/class exists
            // if (in_array($user->username, ['admin', 'user'])) {
            //     $user->assignRole($user->username);
            // }
        }
    }
}
