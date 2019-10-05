<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends ApiController
{

    public function index(Request $request){
        $rentals = Rental::all();

        return $this->showCollectionResponse($rentals);
    }

    public function show(Request $request, Rental $rental){
        return $this->showInstanceResponse($rental);
    }
}
