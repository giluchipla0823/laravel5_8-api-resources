<?php

namespace App\Http\Controllers;

use App\Models\ModelVehicle;
use Illuminate\Http\Request;

class ModelVehicleController extends ApiController
{
    public function index(Request $request){
        $modelVehicles = ModelVehicle::all();

        return $this->showCollectionResponse($modelVehicles);
    }

    public function show(Request $request, ModelVehicle $modelVehicle){
        return $this->showInstanceResponse($modelVehicle);
    }
}
