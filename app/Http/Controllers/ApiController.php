<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Traits\TransformResponser;

class ApiController extends Controller
{
    use ApiResponser, TransformResponser;
}
