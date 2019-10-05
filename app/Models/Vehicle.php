<?php

namespace App\Models;

use App\Http\Resources\VehicleResource;

class Vehicle extends BaseModel
{
    protected $guarded = ['id'];

    public $relationships = [
        'rentals',
        'model_vehicle',
        'location',
        'type_vehicle'
    ];

    public $transformer = VehicleResource::class;

    public function rentals(){
        return $this->hasMany(Rental::class);
    }

    public function model_vehicle(){
        return $this->belongsTo(ModelVehicle::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function type_vehicle(){
        return $this->belongsTo(TypeVehicle::class);
    }
}
