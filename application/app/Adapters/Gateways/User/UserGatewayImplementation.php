<?php

namespace App\Adapters\Gateways\User;

use App\Adapters\Models\User;
use App\Domain\Entities\UserEntity;
use App\Domain\Ports\UserGatewayPort;
use App\Domain\ValueObjects\Email;

class UserGatewayImplementation implements UserGatewayPort
{
    public function __construct(
        private readonly User $user,
    )
    {
    }

    public function save(UserEntity $userEntity): void
    {
        $user = $this->user->newInstance();

        $user->name     = $userEntity->name;
        $user->email    = $userEntity->email;
        $user->password = $userEntity->password;

        $user->save();
    }

    public function findByEmail(Email $email): ?UserEntity
    {
        $user = $this->user->where('email', $email)->first();

        return !$user ? null : new UserEntity(
            $user->name,
            new Email($user->email),
            $user->password,
            $user->id
        );
    }
}
