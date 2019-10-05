<?php

namespace App\Models;

use App\Http\Resources\ModelVehicleResource;

class ModelVehicle extends BaseModel
{
    protected $guarded = ['id'];
    public $transformer = ModelVehicleResource::class;
    public $relationships = [
        'manufacturer',
        'vehicles'
    ];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
