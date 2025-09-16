<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Domain\Exceptions\BadRequestException;
use App\Domain\Exceptions\InvalidEmailException;
use App\Domain\Exceptions\NotFoundException;
use Illuminate\Validation\ValidationException;
use App\Domain\Exceptions\UnauthorizedException;
use Illuminate\Database\QueryException;
use Illuminate\Database\LostConnectionException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
//        web: __DIR__.'/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Exception $exception) {
            $exceptions_class = [
                /**
                 * Domain Exceptions
                 */
                BadRequestException::class   => ['message' => $exception->getMessage(), 'status' => 400],
                NotFoundException::class     => ['message' => $exception->getMessage(), 'status' => 404],
                InvalidEmailException::class => ['message' => $exception->getMessage(), 'status' => 400],
                ValidationException::class   => ['message' => $exception->getMessage(), 'status' => 422],
                UnauthorizedException::class => ['message' => $exception->getMessage(), 'status' => 401],

                /**
                 * System Exceptions
                 */
                QueryException::class => [
                    'message' => 'A database query error occurred. Please check your request or try again later.',
                    'status'  => 500
                ],
                LostConnectionException::class => [
                    'message' => 'The connection to the database was lost. Please try again later.',
                    'status'  => 500
                ]
            ];

            foreach ($exceptions_class as $exception_class => $domain_exception_fields) {
                if ($exception instanceof $exception_class) {
                   return response()->json([
                       'message' => $domain_exception_fields['message'],
                   ], $domain_exception_fields['status']);
                }
            }

            return response()->json([
                'message' => $exception->getMessage(),
            ], 400);
        });
    })->create();
