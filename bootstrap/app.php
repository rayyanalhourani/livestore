<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // You can add global middleware here if needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpException $exception, Request $request) {
            $status = $exception->getStatusCode();

            return match ($status) {
                404 => response()->view('errors', [
                    "error" => 404,
                    "message" => "404 Not Found",
                    "hint" => "Your visited page not found. You may go home page."
                ], 404),

                500 => response()->view('errors', [
                    "error" => 500,
                    "message" => "500 Internal Server Error",
                    "hint" => "Something went wrong on the server. Please try again later."
                ], 500),

                403 => response()->view('errors', [
                    "error" => 403,
                    "message" => "403 Forbidden",
                    "hint" => "You don't have permission to access this page."
                ], 403),

                401 => response()->view('errors', [
                    "error" => 401,
                    "message" => "401 Unauthorized",
                    "hint" => "You must be logged in to access this page."
                ], 401),

                422 => response()->view('errors', [
                    "error" => 422,
                    "message" => "422 Unprocessable Entity",
                    "hint" => "There was an error with the data you provided. Please check and try again."
                ], 422),

                408 => response()->view('errors', [
                    "error" => 408,
                    "message" => "408 Request Timeout",
                    "hint" => "The server took too long to respond. Please try again later."
                ], 408),

                default => null,
            };
        });
    })
    ->create();
