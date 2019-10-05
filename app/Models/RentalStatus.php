<?php

namespace App\Models;

use App\Http\Resources\RentalStatusResource;

class RentalStatus extends BaseModel
{
    public $transformer = RentalStatusResource::class;

    public $relationships = ['rentals'];

    public function rentals() {
        return $this->hasMany(Rental::class);
    }
}
