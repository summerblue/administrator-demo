<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy extends Policy
{
    public function update(User $user, Post $post)
    {
        // return $post->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Post $post)
    {
        return true;
    }
}
