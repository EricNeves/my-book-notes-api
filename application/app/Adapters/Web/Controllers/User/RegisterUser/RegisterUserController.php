<?php

namespace App\Adapters\Web\Controllers\User\RegisterUser;

use Illuminate\Http\JsonResponse;

class RegisterUserController
{
    public function __construct()
    {
    }

    public function handle(RegisterUserRequest $request): JsonResponse
    {
        return response()->json([
            'data' => $request->validated()
        ]);
    }
}
