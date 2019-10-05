<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    use ApiResponser;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof RelationNotFoundException){
            return $this->_resolveRelationNotFoundException($exception);
        }

        return parent::render($request, $exception);
    }

    private function _resolveRelationNotFoundException(RelationNotFoundException $exception){
        $model = class_basename($exception->model);
        $relations = implode(', ' , $exception->model->relationships);

        $message = "No existe una relación \"{$exception->relation}\" para la instancia {$model}.";

        if($message){
            $message .= " Las relaciones válidad son: {$relations}";
        }

        return $this->errorResponse($message, Response::HTTP_BAD_REQUEST);
    }
}
