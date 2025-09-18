<?php

namespace App\Domain\Ports;

use App\Domain\Entities\UserEntity;

interface UserGatewayPort
{
    public function save(UserEntity $userEntity): void;
}
