<?php

namespace App\Services\MessagesServices;

use Illuminate\Support\Facades\DB;

class messagesServices
{
    public function getuserConversationsLastMessage($userId)
    {
        $first = DB::table('conversations')
            ->select('conversations.id as conversation_id', 'conversations.user_2 as uid', 'conversations.last_message')
            ->where('user_1', $userId)
            ->where('user_2', '!=', $userId);

        $second = DB::table('conversations')
            ->select('conversations.id as conversation_id', 'conversations.user_1 as uid', 'conversations.last_message')
            ->where('user_1', '!=', $userId)
            ->where('user_2', $userId)
            ->unionAll($first);

        // Execute and get the result of the union query
        $combinedConversations = DB::table(DB::raw("({$second->toSql()}) as combined_conversations"))
            ->mergeBindings($second)->join('users', 'users.id', '=', 'combined_conversations.uid')->
            leftJoin('messages', 'messages.id', '=', 'combined_conversations.last_message')
            ->orderBy('messages.created_at', 'desc')
            ->select('name', 'uid', 'last_message', 'conversation_id', 'body', 'messages.created_at as message_created_at', 'messages.sender_id')->paginate(10);

        return $combinedConversations;
    }
    public function getuserGroupsLastMessage($userId)
    {
        $data = DB::table('users')->select('users.id as current_user_id', 'group_users.group_id', 'groups.last_message', 'messages.id as message_id', 'messages.body', 'messages.sender_id', 'messages.created_at as message_created_at', )->
            join('group_users', 'group_users.user_id', '=', 'users.id')->
            join('groups', 'groups.id', '=', 'group_users.group_id')
            ->join('messages', 'messages.id', '=', 'groups.last_message')->
            where('users.id', '=', $userId)->orderBy('message_created_at', 'desc')
        ;
        return $data;
    }
    public function getGroupsUsers($userId)
    {
        $currentUserGroups = $this->getuserGroupsLastMessage($userId);
        $GroupsUsers = DB::table(DB::raw("({$currentUserGroups->toSql()}) as currentUserGroups"))
            ->mergeBindings($currentUserGroups)->join("users", "users.id", "=", 'sender_id')
            ->select('id as uid', 'body', 'sender_id', 'users.name', 'picture', 'message_created_at', 'group_id')->paginate(10);
        return $GroupsUsers;
    }

}
