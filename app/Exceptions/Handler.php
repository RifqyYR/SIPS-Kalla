<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

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

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            $response = [];
    
            if ($exception instanceof ValidationException) {
                $errors = $exception->errors();
    
                // Get the first error message for each field
                $firstErrors = array_map(function ($errorMessages) {
                    return $errorMessages[0];
                }, $errors);
    
                $response['message'] = 'Validation Error';
                $response['errors'] = $firstErrors;
                return response()->json($response, 422);
            }
    
            $response['message'] = $exception->getMessage();
            return response()->json($response, 500);
        }
    
        return parent::render($request, $exception);
    }
}
