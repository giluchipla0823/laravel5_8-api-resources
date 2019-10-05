<?php

namespace App\Models;

use App\Http\Resources\TypeVehicleResource;

class TypeVehicle extends BaseModel
{
    protected $guarded = ['id'];

    public $transformer = TypeVehicleResource::class;

    public $relationships = ['vehicles'];

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}
