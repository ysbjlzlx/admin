<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * GET /photos.
     */
    public function index()
    {
        $list = Post::all();

        return view('posts.index', ['posts' => $list]);
    }

    /**
     * GET /photos/create.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * POST /photos.
     */
    public function store(Request $request)
    {
        $rules = [
            'content'=>['required','string'],
            'description'=>['required','string'],
        ];
        $this->validate($request,$rules);
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->content = $request->input('content');
        $post->description = $request->input('description');
        $post->save();
        return redirect()->to('posts');
    }

    /**
     * GET /photos/{photo}.
     */
    public function show()
    {
    }

    /**
     * GET /photos/{photo}/edit.
     */
    public function edit()
    {
    }

    /**
     * PUT/PATCH /photos/{photo}.
     */
    public function update()
    {
    }

    /**
     * DELETE /photos/{photo}.
     */
    public function destroy()
    {
    }
}
