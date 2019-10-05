<?php

namespace App\Http\Resources;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ModelVehicleResource extends JsonResource
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
            'dailyHiteRate' => $this->daily_hite_rate,
            'createdAt' => $this->created_at,
        ];

        $relationships = $this->resource->getRelations();

        if(array_key_exists('manufacturer', $relationships)){
            $response['manufacturer'] = $this->includeManufacturer($this->manufacturer);
        }

        if(array_key_exists('vehicles', $relationships)){
            $response['vehicles'] = $this->includeVehicles($this->vehicles);
        }

        return $response;
    }

    /**
     * Incluir relación de Fabricante
     *
     * @param Manufacturer $manufacturer
     * @return ManufacturerResource
     */
    protected function includeManufacturer(Manufacturer $manufacturer){
        return new ManufacturerResource($manufacturer);
    }

    /**
     * Incluir relación de vehículos
     *
     * @param Collection $vehicles
     * @return AnonymousResourceCollection
     */
    protected function includeVehicles(Collection $vehicles){
        return VehicleResource::collection($vehicles);
    }
}
