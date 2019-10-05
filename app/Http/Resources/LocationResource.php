<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'createdAt' => $this->created_at
        ];

        if(array_key_exists('vehicles', $this->resource->getRelations())){
            $response['vehicles'] = $this->includeVehicles($this->vehicles);
        }

        return $response;
    }

    public function includeVehicles(Collection $vehicles){
        return VehicleResource::collection($vehicles);
    }
}
