<?php

namespace App\Http\Resources;

use App\Models\Location;
use App\Models\ModelVehicle;
use App\Models\TypeVehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'modelVehicleId' => $this->model_vehicle_id,
            'typeVehicleId' => $this->type_vehicle_id,
            'locationId' => $this->location_id,
            'currentKilometers' => $this->current_kilometers,
            'engineSize' => $this->engine_size,
            'fuelType' => $this->fuel_type,
            'createdAt' => $this->created_at,
        ];

        $relationships = $this->resource->getRelations();

        if(array_key_exists('rentals', $relationships)){
            $response['rentals'] = $this->includeRentals($this->rentals);
        }

        if(array_key_exists('model_vehicle', $relationships)){
            $response['modelVehicle'] = $this->includeModelVehicle($this->model_vehicle);
        }

        if(array_key_exists('location', $relationships)){
            $response['location'] = $this->includeLocation($this->location);
        }

        if(array_key_exists('type_vehicle', $relationships)){
            $response['typeVehicle'] = $this->includeTypeVehicle($this->type_vehicle);
        }

        return $response;
    }

    protected function includeRentals(Collection $rentals){
        return RentalResource::collection($rentals);
    }

    protected function includeModelVehicle(ModelVehicle $modelVehicle){
        return new ModelVehicleResource($modelVehicle);
    }

    protected function includeLocation(Location $location){
        return new LocationResource($location);
    }

    protected function includeTypeVehicle(TypeVehicle $typeVehicle){
        return new TypeVehicleResource($typeVehicle);
    }
}
