<?php

namespace App\Domain\Services;

use App\Domain\Entities\UserEntity;

interface AccessTokenService
{
    public function sign(UserEntity $userEntity): string;
}
