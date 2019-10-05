<?php

namespace App\Models;

use App\Http\Resources\ManufacturerResource;

class Manufacturer extends BaseModel
{
    public $transformer = ManufacturerResource::class;

    public $relationships = ['models'];

    protected $guarded = ['id'];

    public function models(){
        return $this->hasMany(ModelVehicle::class);
    }
}
