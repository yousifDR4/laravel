<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class groupController extends Controller
{
    //
    public function index(request $request, $group_id)
    {
        $data = message::query()->where('group_id', '=', $group_id)->orderBy('created_at', 'desc')->paginate(10);
        return new JsonResponse($data);

    }
}
