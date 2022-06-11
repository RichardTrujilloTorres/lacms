<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostUpdate;
use App\Models\Post;
use Illuminate\Http\Response;

class PostsController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $posts = Post::with('author')->paginate(10);

        return response()->json([
            'data' => compact('posts')
        ]);
    }

    public function show(Post $post): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => compact('post'),
        ]);
    }

    public function update(Post $post, PostUpdate $postUpdate): \Illuminate\Http\JsonResponse
    {
        $post->fill($postUpdate->only(['title', 'body']))->save();

        return response()->json([
            'status' => 'success',
            'data' => compact('post'),
        ], Response::HTTP_CREATED);
    }

    public function delete(Post $post): \Illuminate\Http\JsonResponse
    {
        $post->delete();

        return response()->json([
            'status' => 'success',
            'data' => [],
        ], Response::HTTP_CREATED);
    }
}
