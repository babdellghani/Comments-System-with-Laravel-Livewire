<?php

namespace App\Policies;

use App\Models\Episode;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EpisodePolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->exists;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Episode $episode): bool
    {
        return $user->id === $episode->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Episode $episode): bool
    {
        return $user->id === $episode->user_id;
    }
}
