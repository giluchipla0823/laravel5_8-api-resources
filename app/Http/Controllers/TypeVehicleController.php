<?php

namespace App\Http\Controllers;

use App\Models\TypeVehicle;
use Illuminate\Http\Request;

class TypeVehicleController extends ApiController
{
    public function index(Request $request){
        $typeVehicles = TypeVehicle::all();

        return $this->showCollectionResponse($typeVehicles);
    }

    public function show(Request $request, TypeVehicle $typeVehicle){
        return $this->showInstanceResponse($typeVehicle);
    }
}
