<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'name' => $this->name,
            'details' => $this->details,
            "createdAt" => $this->created_at
        ];

        if(array_key_exists('models', $this->resource->getRelations())){
            $response['models'] = $this->includeModels($this->models);
        }

        return $response;
    }

    protected function includeModels(Collection $models){
        return ModelVehicleResource::collection($models);
    }
}
