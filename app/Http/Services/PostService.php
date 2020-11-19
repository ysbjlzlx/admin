<?php

namespace App\Http\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;

class PostService
{
    public function add(User $user, string $content, string $description = null, string $sourceUrl = null, bool $isPublished = false): Post
    {
        $post = new Post();
        $post->user_id = $user->id;
        $post->content = $content;
        $post->description = $description;
        $post->source_url = $sourceUrl;
        if ($isPublished) {
            $post->published_at = Carbon::now();
        }
        $post->save();

        return $post;
    }
}
