<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        
        // if ($request->wantsJson()) {
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    "message" => "No se ha encontrado el dato",
                    "status" => Response::HTTP_NOT_FOUND
                ], Response::HTTP_NOT_FOUND);
            }
        //     return response()->json([
        //         "Error" => "Error en el servidor",
        //         "status" => Response::HTTP_INTERNAL_SERVER_ERROR
        //     ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }
        // dd($exception);
        // die();
        return parent::render($request, $exception);
    }
}
