<?php

namespace App\Application\UseCases\User\AuthenticateUser;

use App\Application\DTOs\User\AuthenticateUserDTO;
use App\Domain\Exceptions\NotFoundException;
use App\Domain\Exceptions\UnauthorizedException;
use App\Domain\Ports\UserGatewayPort;
use App\Domain\Services\AccessTokenService;
use App\Domain\Services\PasswordEncrypterService;
use App\Domain\ValueObjects\Email;

class AuthenticateUserUseCase implements IAuthenticateUserUseCase
{
    public function __construct(
        private readonly UserGatewayPort          $userGatewayPort,
        private readonly AccessTokenService       $accessTokenService,
        private readonly PasswordEncrypterService $passwordEncrypterService
    )
    {
    }

    public function execute(AuthenticateUserDTO $authenticateUserDTO): string
    {
        $user = $this->userGatewayPort->findByEmail(
            new Email(
                $authenticateUserDTO->email
            )
        );

        if (!$user) {
            throw new NotFoundException(
                'Authentication failed. Please check your email and password.'
            );
        }

        if (!$this->passwordEncrypterService->compare($authenticateUserDTO->password, $user->password)) {
            throw new UnauthorizedException(
                'Authentication failed. Please check your email and password.'
            );
        }

        return $this->accessTokenService->sign($user);
    }
}
