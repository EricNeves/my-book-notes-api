<?php

namespace App\Application\UseCases\User\AuthenticateUser;

use App\Application\DTOs\User\AuthenticateUserDTO;

interface IAuthenticateUserUseCase
{
    public function execute(AuthenticateUserDTO $authenticateUserDTO): string;
}
