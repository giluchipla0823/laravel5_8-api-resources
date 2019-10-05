<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends ApiController
{
    /**
     * Lista de locaciones
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request){
        $customers = Customer::all();

        return $this->showCollectionResponse($customers);
    }

    /**
     * Obtener locación
     *
     * @param Request $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function show(Request $request, Customer $customer){
        return $this->showInstanceResponse($customer);
    }
}
