<?php

namespace Database\Seeders;

use App\Adapters\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make($_ENV['INITIAL_USER_PASSWORD']);

        $userData = [
            'name'     => $_ENV['INITIAL_USER_NAME'],
            'email'    => $_ENV['INITIAL_USER_EMAIL'],
            'password' => $password
        ];

        $user = new User();

        $user->fill($userData);

        $user->save();
    }
}
