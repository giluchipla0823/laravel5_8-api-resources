<?php

namespace App\Models;

use App\Http\Resources\LocationResource;

class Location extends BaseModel
{
    protected $guarded = ['id'];

    public $transformer = LocationResource::class;

    public $relationships = ['vehicles'];

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}
