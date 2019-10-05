<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index(Request $request){
        $users = User::all();

        return $this->showCollectionResponse($users);
    }

    public function show(Request $request, User $user){
        return $this->showInstanceResponse($user);
    }
}
