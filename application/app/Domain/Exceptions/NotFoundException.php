<?php

namespace App\Domain\Exceptions;

class NotFoundException extends \Exception
{
    public function __construct(string $message = 'Not Found')
    {
        parent::__construct($message);
    }
}
