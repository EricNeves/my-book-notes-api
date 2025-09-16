<?php

namespace App\Domain\Exceptions;

class InvalidEmailException extends \Exception
{
    public function __construct($message = "Invalid Email Address")
    {
        parent::__construct($message);
    }
}
