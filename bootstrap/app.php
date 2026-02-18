<?php

use Illuminate\Foundation\Application;
// use Illuminate\Foundation\Configuration\Exceptions;
// use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // Optional custom route group
            if (file_exists(base_path('routes/custom.php'))) {
                Route::middleware('api')
                    ->prefix('custom')
                    ->name('custom.')
                    ->group(base_path('routes/custom.php'));
            }
        },
    )
    ->withMiddleware(function ($middleware): void {
        $middleware->alias([
            'admin.auth' => \App\Http\Middleware\AdminAuth::class,
        ]);
    })
    ->withExceptions(function ($exceptions): void {
        // Custom exception handling
    })
    ->create();

