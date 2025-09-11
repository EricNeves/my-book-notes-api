<?php

use App\Adapters\Web\Controllers\User\RegisterUser\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('users', [RegisterUserController::class, 'handle']);
