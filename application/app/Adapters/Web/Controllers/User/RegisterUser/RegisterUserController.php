<?php

namespace App\Adapters\Web\Controllers\User\RegisterUser;

use App\Application\DTOs\User\RegisterUserDTO;
use App\Application\UseCases\User\RegisterUser\RegisterUserUseCase;
use Illuminate\Http\JsonResponse;

class RegisterUserController
{
    public function __construct(private readonly RegisterUserUseCase $registerUserUseCase)
    {
    }

    public function handle(RegisterUserRequest $request): JsonResponse
    {
        $dto = RegisterUserDTO::fromArray($request->validated());

        $this->registerUserUseCase->execute($dto);

        return response()->json([
            'data' => "User registered successfully!"
        ], 201);
    }
}
