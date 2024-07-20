<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Workbench\App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthContrller extends Controller
{
    public function show(Request $request)
    {

        return new JsonResponse(["data"=>$request->user()]);

    }

}
