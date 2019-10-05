<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ManufacturerController extends ApiController
{
    /**
     * Lista de fabricantes
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request){
        $manufacturers = Manufacturer::all();

        return $this->showCollectionResponse($manufacturers);
    }

    /**
     * Obtener fabricante
     *
     * @param Manufacturer $manufacturer
     * @return JsonResponse
     */
    public function show(Manufacturer $manufacturer){
        return $this->showInstanceResponse($manufacturer);
    }
}
