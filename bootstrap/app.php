<?php

use Ejarnutowski\LaravelApiKey\Models\ApiKey;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('api')
                ->prefix('api')
                ->middleware('auth.apikey')
                ->group(base_path('routes/api.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(using: function (Exceptions $exceptions) {
        $exceptions->render(using: function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                $header = $request->header('X-Authorization');
                $apiKey = ApiKey::getByKey($header);

                if (!$apiKey instanceof ApiKey) {
                    return response([
                        'errors' => [[
                            'message' => 'Unauthorized'
                        ]]
                    ], 401);
                }
                return response()->json([
                    'message' => 'Record not found.'
                ], 404);
            }
        });
    })->create();
