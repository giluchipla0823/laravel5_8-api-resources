<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends ApiController
{
    public function index(Request $request){
        $vehicles = Vehicle::all();

        return $this->showCollectionResponse($vehicles);
    }

    public function show(Request $request, Vehicle $vehicle){
        return $this->showInstanceResponse($vehicle);
    }
}
