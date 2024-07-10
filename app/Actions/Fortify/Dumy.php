<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;

class Dumy
{
   function __invoke(Request $request,$next){
    $next($request);
    }
}
