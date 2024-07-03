<?php
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
// Route::post('/register', [RegisterController::class,"register"]);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// Route::post('/', function (Request $request) {
//     return 200;
// });
// Route::post('/post',[PostController::class ,"store"]);
// route::bind("user",function($value){
//     return 1234;
// });
require __DIR__ . "\api\user.php";
require __DIR__ . "\api\comment.php";
require __DIR__ . "\api\post.php";
Route::get("/test",function(Request $Request){
    $collection=collect([
        ["name"=>"ahmed"],["name"=>"ali"],["name"=>"yousif"]
    ]);
    return $collection->all();
    // return $collection->filter(function ($items){
    //     return $items["name"]==="ali";
    // });
        // return new JsonResponse([
        //     "data"=>$id
        // ]);
    });


