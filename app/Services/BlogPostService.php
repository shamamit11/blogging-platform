<?php

namespace App\Services;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;

class BlogPostService
{
    public function create(array $data)
    {
        $user = Auth::user();

        $post = $user->posts()->create([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        return $post;
    }

    public function update(BlogPost $post, array $data)
    {
        $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        return $post;
    }

    public function delete(BlogPost $post)
    {
        $post->delete();
    }
}
