<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate();
        return PostResource::collection($posts);
    }


    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }


    public function show($post)
    {
        $post = Post::find($post);
        return new PostResource($post);
    }
}
