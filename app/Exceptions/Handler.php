<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function render($request, Throwable $e)
     {
         if ($request->is('api/*') || $request->wantsJson()) {
             $status = match (true) {
                 $e instanceof BadRequestException => 400,
                 $e instanceof UnauthorizedException => 403,
                 $e instanceof AuthenticationException => 401,
                 $e instanceof ValidationException => 422,
                 default => 500,
             };

             return response()->json([
                 'error' => [
                     'status' => $status,
                     'message' => $e->getMessage(),
                 ],
             ], $status);
         }

         return parent::render($request, $e);
     }
}
