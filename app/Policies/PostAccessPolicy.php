<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostAccessPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post)
    {
        if ($user->hasRole(User::ROLE_ADMIN)) {
            return true;
        }
        return $user->id === $post->user_id;
    }

    public function update(User $user, Post $post)
    {
        if ($user->hasRole(User::ROLE_ADMIN)) {
            return true;
        }
        return $user->id === $post->user_id;
    }
}
