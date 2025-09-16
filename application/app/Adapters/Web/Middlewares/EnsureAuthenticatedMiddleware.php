<?php

namespace App\Adapters\Web\Middlewares;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthenticatedMiddleware
{
    public function handle(Request $request, \Closure $next): Response
    {
        return $next($request);
    }
}
