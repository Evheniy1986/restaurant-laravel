<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin_or_manager' => \App\Http\Middleware\AdminOrManagerMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->dontReportDuplicates()
            ->report(function (Throwable $e) {
                $className = get_class($e);
                logger()
                    ->channel('telegram')
                    ->error("🚨🆘😟 ❗❗❗ {$className} \n{$e->getMessage()}\nFile: {$e->getFile()}\nLine: {$e->getLine()}\nTrace: {$e->getTraceAsString()}");

            });
    })->create();
