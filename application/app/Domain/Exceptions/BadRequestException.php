<?php

namespace App\Domain\Exceptions;

class BadRequestException extends \Exception
{
    public function __construct(string $message = 'Not Found')
    {
        parent::__construct($message);
    }
}
