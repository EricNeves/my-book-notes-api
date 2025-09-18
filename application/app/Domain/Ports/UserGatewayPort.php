<?php

namespace App\Domain\Ports;

use App\Domain\Entities\UserEntity;
use App\Domain\ValueObjects\Email;

interface UserGatewayPort
{
    public function save(UserEntity $userEntity): void;
    public function findByEmail(Email $email): ?UserEntity;
}
