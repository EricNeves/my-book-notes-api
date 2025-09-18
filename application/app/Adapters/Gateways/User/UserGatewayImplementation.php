<?php

namespace App\Adapters\Gateways\User;

use App\Adapters\Models\User;
use App\Domain\Entities\UserEntity;
use App\Domain\Ports\UserGatewayPort;

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
}
