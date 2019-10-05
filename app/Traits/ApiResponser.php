<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

Trait ApiResponser
{
    /**
     * Crear respuesta de éxito
     *
     * @param $data
     * @param string $message
     * @param int $code
     * @param array $extras
     * @return JsonResponse
     */
    protected function successResponse($data, $message = 'OK', $code = Response::HTTP_OK, array $extras = []){
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];

        return new JsonResponse($response, $code);
    }

    /**
     * Crear respuesta para collecciones de eloquent
     *
     * @param Collection $data
     * @return JsonResponse
     */
    protected function showCollectionResponse(Collection $data){
        if(count($data) > 0){
            $data = $this->transformCollection($data);
        }

        return $this->successResponse($data);
    }

    /**
     * Crear respuesta para instancias de eloquent
     *
     * @param Model $instance
     * @return JsonResponse
     */
    protected function showInstanceResponse(Model $instance){
        return $this->successResponse($this->transformInstance($instance));
    }

    protected function errorResponse($message, $code, $extras = []){
        $response = [
            'code' => $code,
            'message' => $message
        ];

        return new JsonResponse($response, $code);
    }
}
