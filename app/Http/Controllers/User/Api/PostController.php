<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 添加新的内容.
     */
    public function save(Request $request, PostService $postService)
    {
        $rules = [
            'content' => 'required|string',
            'description' => 'nullable|string',
            'source_url' => 'nullable|url',
            'is_published' => 'nullable|boolean',
        ];
        $messages = [];
        $request->validate($rules, $messages);
        $post = $postService->add(
            $request->user(),
            $request->input('content'),
            $request->input('description'),
            $request->input('source_url'),
            (bool)$request->input('is_published')
        );

        return response()->json(success($post->toArray()));
    }
}
