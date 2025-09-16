<?php

use Illuminate\Support\Facades\Route;
use App\Adapters\Web\Controllers\User\RegisterUser\RegisterUserController;

Route::post('/users', [RegisterUserController::class, 'handle']);
