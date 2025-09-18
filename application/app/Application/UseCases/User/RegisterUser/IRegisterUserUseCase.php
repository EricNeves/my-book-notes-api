<?php

namespace App\Application\UseCases\User\RegisterUser;

use App\Application\DTOs\User\RegisterUserDTO;

interface IRegisterUserUseCase
{
    public function execute(RegisterUserDTO $registerUserDTO): void;
}
