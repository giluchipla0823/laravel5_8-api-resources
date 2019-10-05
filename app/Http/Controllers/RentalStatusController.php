<?php

namespace App\Http\Controllers;

use App\Models\RentalStatus;
use Illuminate\Http\Request;

class RentalStatusController extends ApiController
{
    public function index(Request $request){
        $rentalStatuses = RentalStatus::all();

        return $this->showCollectionResponse($rentalStatuses);
    }

    public function show(Request $request, RentalStatus $rentalStatus){
        return $this->showInstanceResponse($rentalStatus);
    }
}
