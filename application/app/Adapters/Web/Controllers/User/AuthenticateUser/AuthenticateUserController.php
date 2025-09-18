<?php

namespace App\Adapters\Web\Controllers\User\AuthenticateUser;

use App\Application\DTOs\User\AuthenticateUserDTO;
use App\Application\UseCases\User\AuthenticateUser\AuthenticateUserUseCase;
use Illuminate\Http\JsonResponse;

class AuthenticateUserController
{
    public function __construct(private readonly AuthenticateUserUseCase $authenticateUserUseCase)
    {
    }

    public function handle(AuthenticateUserRequest $request): JsonResponse
    {
        $dto = AuthenticateUserDTO::fromArray($request->validated());

        return response()->json([
            'token' => $this->authenticateUserUseCase->execute($dto)
        ]);
    }
}
