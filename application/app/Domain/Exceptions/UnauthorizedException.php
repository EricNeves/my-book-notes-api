<?php

namespace App\Domain\Exceptions;

class UnauthorizedException extends \Exception
{
    public function __construct(string $message = 'Unauthorized')
    {
        parent::__construct($message);
    }
}
