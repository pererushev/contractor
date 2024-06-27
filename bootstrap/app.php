<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e, $request) {

            if($request->is('api/*')){
                return response()->json([
                    'message' => 'Resource not found',
                    'type' => 'NotFoundHttpException',
                    'code' => '4405',
                    'link' => 'example.com/link',
                    'status_code' => (string)$e->getStatusCode(),
                ], 404);
            }

            
        });
        //
    })->create();
