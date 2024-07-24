<?php

namespace App\Services\MessagesServices;

use Illuminate\Support\Facades\DB;

class messagesServices
{
    public function getuserConversationsLastMessage($userId)
    {
        $first = DB::table('conversations')
            ->select('conversations.id as c', 'conversations.user_2 as combined_user', 'conversations.last_message')
            ->where('user_1', $userId)
            ->where('user_2', '!=', $userId);

        $second = DB::table('conversations')
            ->select('conversations.id as c', 'conversations.user_1 as combined_user', 'conversations.last_message')
            ->where('user_1', '!=', $userId)
            ->where('user_2', $userId)
            ->unionAll($first);

        // Execute and get the result of the union query
        $combinedConversations = DB::table(DB::raw("({$second->toSql()}) as combined_conversations"))
            ->mergeBindings($second)->join('users', 'users.id', '=', 'combined_conversations.combined_user')->
            leftJoin('messages', 'messages.id', '=', 'combined_conversations.last_message')
            ->get(['name', 'combined_user', 'last_message', 'c', 'body']);
        return $combinedConversations;
    }
    public function getuserGroupsLastMessage($userId)
    {
        $data = DB::table('users')->select('users.id as uid', 'group_users.group_id', 'groups.last_message', 'messages.id as message_id', 'messages.body', 'messages.sender_id')->
            join('group_users', 'group_users.user_id', '=', 'users.id')->
            join('groups', 'groups.id', '=', 'group_users.group_id')
            ->join('messages', 'messages.id', '=', 'groups.last_message')->
            where('users.id', '=', $userId)
        ;
        return $data;
    }
    public function getGroupsUsers($userId)
    {
        $currentUserGroups = $this->getuserGroupsLastMessage($userId);
        $GroupsUsers = DB::table(DB::raw("({$currentUserGroups->toSql()}) as currentUserGroups"))
            ->mergeBindings($currentUserGroups)
            ->join('group_users', 'group_users.group_id', '=', 'currentUserGroups.group_id')
            ->select('group_users.user_id')->where('group_users.user_id', '!=', $userId);
        return $GroupsUsers;
    }

}
