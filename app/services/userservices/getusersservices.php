<?php
namespace App\Services\userservices;

use Illuminate\Support\Facades\DB;

class getusersservices
{
    public function getUnrealteduUers($userId)
    {
        $first = DB::table('conversations')
            ->select('conversations.user_2 as uid')
            ->where('user_1', $userId)
            ->where('user_2', '!=', $userId);

        $second = DB::table('conversations')
            ->select('conversations.user_1 as uid')
            ->where('user_1', '!=', $userId)
            ->where('user_2', $userId)
            ->unionAll($first);

        // Execute and get the result of the union query

        $arr = $second->get()->map(function ($item) {
            return $item->uid;
        });

        $UnrealteduUers = DB::table('users')->whereNotIn('id', $arr)
            ->select('users.*')->paginate(10);

        return $UnrealteduUers;
    }

}
