<?php

namespace App\Adapters\Services;

use App\Adapters\Models\User;
use App\Domain\Entities\UserEntity;
use App\Domain\Services\AccessTokenService;
use Tymon\JWTAuth\Facades\JWTAuth;

class AccessTokenServiceImplementation implements AccessTokenService
{
    public function sign(UserEntity $userEntity): string
    {
        $user = new User();

        $user->id    = $userEntity->id;
        $user->name  = $userEntity->id;
        $user->email = $userEntity->id;

        return JWTAuth::fromUser($user);
    }
}
