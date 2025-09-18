<?php

namespace App\Domain\Services;

interface PasswordEncrypterService
{
    public function encrypt(string $password): string;
}
