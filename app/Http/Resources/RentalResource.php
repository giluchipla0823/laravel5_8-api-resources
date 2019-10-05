<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\RentalStatus;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
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
            'vehicleId' => $this->vehicle_id,
            'rentalStatusId' => $this->rental_status_id,
            'customerId' => $this->customer_id,
            'from' => $this->from,
            'to' => $this->to,
        ];

        $relationships = $this->resource->getRelations();

        if(array_key_exists('vehicle', $relationships)){
            $response['vehicle'] = $this->includeVehicle($this->vehicle);
        }

        if(array_key_exists('rental_status', $relationships)){
            $response['rentalStatus'] = $this->includeRentalStatus($this->rental_status);
        }

        if(array_key_exists('customer', $relationships)){
            $response['customer'] = $this->includeCustomer($this->customer);
        }

        return $response;
    }

    /**
     * Incluir información de estado del alquiler
     *
     * @param RentalStatus $rentalStatus
     * @return RentalStatusResource
     */
    protected function includeRentalStatus(RentalStatus $rentalStatus){
        return new RentalStatusResource($rentalStatus);
    }

    /**
     * Incluir información del vehículo
     *
     * @param Vehicle $vehicle
     * @return VehicleResource
     */
    protected function includeVehicle(Vehicle $vehicle){
        return new VehicleResource($vehicle);
    }

    /**
     * Incluir información
     *
     * @param Customer $customer
     * @return CustomerResource
     */
    protected function includeCustomer(Customer $customer){
        return new CustomerResource($customer);
    }
}
