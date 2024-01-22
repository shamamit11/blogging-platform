<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;
    
    public function create(User $user)
    {
        // Only authenticated users can create blog posts
        return $user->id !== null;
    }

    public function update(User $user, BlogPost $post)
    {
        // Only the author of the post can update it
        return $user->id === $post->author_id;
    }

    public function delete(User $user, BlogPost $post)
    {
        // Only the author of the post can delete it
        return $user->id === $post->author_id;
    }
}
