<?php

namespace App\Traits;

use App\Helpers\AppHelper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

Trait TransformResponser{

    /**
     * Aplicar transformación de recurso para colecciones
     *
     * @param Collection $data
     * @return array|Collection
     */
    protected function transformCollection(Collection $data){
        $instance = $this->setIncludedRelationships($data->first());

        return $this->_resolveTransformResource($data, $instance->transformer);
    }

    /**
     * Aplicar transformación de recurso para una instancia
     *
     * @param Model $instance
     * @return array|Model
     */
    protected function transformInstance(Model $instance){
        $instance = $this->setIncludedRelationships($instance);

        return $this->_resolveTransformResource($instance, $instance->transformer);
    }

    /**
     * Cargar relaciones para instancia según el parámetro "includes"
     * enviado en el queryParams
     *
     * @param Model $instance
     * @return Model
     */
    protected function setIncludedRelationships(Model $instance){
        return $instance->load(AppHelper::getIncludesFromQueryParams());
    }

    /**
     * Resuelve el recurso a transformar y devuelve un array
     *
     * @param Collection|Model $data
     * @param string|null $transformer
     * @return array|Collection|Model
     */
    private function _resolveTransformResource($data, $transformer) {
        if(!class_exists($transformer)){
            return $data;
        }

        $resource = NULL;

        if($data instanceof Model){
            $resource = new $transformer($data);
        }else if($data instanceof Collection){
            $resource = $transformer::collection($data);
        }

        if(!$resource instanceof JsonResource){
            return [];
        }

        return $this->_resolveData($resource);
    }

    /**
     * Obtener los datos del recurso
     *
     * @param JsonResource $resource
     * @return array
     */
    private function _resolveData(JsonResource $resource): array {
        return $resource->response()->getData(TRUE)['data'];
    }
}
