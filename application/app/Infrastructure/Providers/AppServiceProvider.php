<?php

namespace App\Infrastructure\Providers;

use App\Adapters\Gateways\User\UserGatewayImplementation;
use App\Adapters\Services\AccessTokenServiceImplementation;
use App\Adapters\Services\PasswordEncrypterServiceImplementation;
use App\Domain\Ports\UserGatewayPort;
use App\Domain\Services\AccessTokenService;
use App\Domain\Services\PasswordEncrypterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind(UserGatewayPort::class, UserGatewayImplementation::class);
        $this->app->bind(PasswordEncrypterService::class, PasswordEncrypterServiceImplementation::class);
        $this->app->bind(AccessTokenService::class, AccessTokenServiceImplementation::class);
    }
}
