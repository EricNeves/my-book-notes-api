<?php

namespace App\Infrastructure\Providers;

use App\Adapters\Gateways\User\UserGatewayImplementation;
use App\Domain\Ports\UserGatewayPort;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind(UserGatewayPort::class, UserGatewayImplementation::class);
    }
}
