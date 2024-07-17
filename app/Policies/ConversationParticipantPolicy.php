<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\conversation_participant;
use App\Models\User;

class ConversationParticipantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, conversation_participant $conversationParticipant): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, conversation_participant $conversationParticipant): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, conversation_participant $conversationParticipant): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, conversation_participant $conversationParticipant): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, conversation_participant $conversationParticipant): bool
    {
        //
    }
}
