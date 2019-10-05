<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class LocationController extends ApiController
{

    /**
     * Lista de locaciones
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request){
        $locations = Location::all();

        return $this->showCollectionResponse($locations);
    }

    /**
     * Obtener locación
     *
     * @param Request $request
     * @param Location $location
     * @return JsonResponse
     */
    public function show(Request $request, Location $location){
        return $this->showInstanceResponse($location);
    }
}
