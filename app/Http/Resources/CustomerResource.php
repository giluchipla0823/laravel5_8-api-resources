<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    private $_request;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->_request = $request;

        $response = [
            'id' => $this->id,
            'userId' => $this->user_id,
            'createdAt' => $this->created_at,
        ];

        $relationships = $this->resource->getRelations();

        if(array_key_exists('user', $relationships)){
            $response['user'] =  $this->includeUser($this->user);
        }

        if(array_key_exists('rentals', $relationships)){
            $response['rentals'] = $this->includeRentals($this->rentals);
        }

        return $response;
    }

    protected function includeUser(User $user){
        return new UserResource($user);
    }

    protected function includeRentals(Collection $rentals){
        if(count($rentals) > 0){
//            $instance = $rentals->first();
//
////            dump($this->_request->query->get('rentals'));
////            exit();
//
//
//
//            $instance->load(['vehicle']);
        }

        return RentalResource::collection($rentals);
    }
}
