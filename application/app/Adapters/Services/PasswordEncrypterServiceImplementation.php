<?php

namespace App\Adapters\Services;

use App\Domain\Services\PasswordEncrypterService;
use Illuminate\Support\Facades\Hash;

class PasswordEncrypterServiceImplementation implements PasswordEncrypterService
{
    public function encrypt(string $password): string
    {
        return Hash::make($password);
    }
}
