<?php

namespace App\Domain\ValueObjects;

use App\Domain\Exceptions\InvalidEmailException;

class Email
{
    public function __construct(private readonly string $email)
    {
        if (!$this->validate($this->email)) {
            throw new InvalidEmailException("The email '{$this->email}' is invalid");
        }
    }

    public function validate(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
