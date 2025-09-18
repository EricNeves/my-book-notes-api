<?php

use Illuminate\Support\Facades\Route;
use App\Adapters\Web\Controllers\User\RegisterUser\RegisterUserController;
use App\Adapters\Web\Controllers\User\AuthenticateUser\AuthenticateUserController;

Route::prefix('users')->group(function () {
    Route::post('/', [RegisterUserController::class, 'handle']);
    Route::post('/authenticate', [AuthenticateUserController::class, 'handle']);
});


