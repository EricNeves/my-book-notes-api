<?php

namespace App\Application\UseCases\User\RegisterUser;

use App\Application\DTOs\User\RegisterUserDTO;
use App\Domain\Entities\UserEntity;
use App\Domain\Ports\UserGatewayPort;
use App\Domain\Services\PasswordEncrypterService;
use App\Domain\ValueObjects\Email;

class RegisterUserUseCase implements IRegisterUserUseCase
{
    public function __construct(
        private readonly UserGatewayPort          $userGatewayPort,
        private readonly PasswordEncrypterService $passwordEncrypterService
    )
    {
    }

    public function execute(RegisterUserDTO $registerUserDTO): void
    {
        $password = $this->passwordEncrypterService->encrypt($registerUserDTO->password);

        $userEntity = new UserEntity(
            name:     $registerUserDTO->name,
            email:    new Email($registerUserDTO->email),
            password: $password
        );

        $this->userGatewayPort->save($userEntity);
    }
}
