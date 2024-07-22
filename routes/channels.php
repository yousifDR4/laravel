<?php

use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Laravel\Reverb\Servers\Reverb\Http\Request;
use User as GlobalUser;
use Workbench\App\Models\User as ModelsUser;
// Broadcast::routes(['middleware' => ['auth:sanctum']]);
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
// Broadcast::channel('store.{box}', function (User $user, $box) {
//     return ["id"=>$user->id,"message"=>""];

// });
Broadcast::channel('chat', function ($user) {
    return true ;

});
Broadcast::channel('conv', function () {
    return true ;

});
Broadcast::channel('message', function () {
    return true ;

});

Broadcast::channel('friends.{roomId}', function (User $user, $roomId) {
    return true;
});
