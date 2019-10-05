<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentalStatusResource extends JsonResource
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
          'status' => $this->status,
          'createdAt' => $this->created_at
        ];

        if(array_key_exists('rentals', $this->resource->getRelations())){
            $response['rentals'] = $this->includesRentals($this->rentals);
        }

        return $response;
    }

    protected function includesRentals(Collection $rentals){
        return RentalResource::collection($rentals);
    }
}
