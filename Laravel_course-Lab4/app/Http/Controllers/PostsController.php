<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostRequest;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $users = User::all();
        return view("posts.create", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        Post::create($request->all());
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param $slugString
     * @return Application|Factory|View|Response
     */
    public function show($slugString)
    {
//        $post = Post::find($id);
        $post = Post::findBySlug($slugString);

        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slugString
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($slugString)
    {
        $post = Post::findBySlug($slugString);
        if ($post) {
            $users = User::all();
            return view("posts.edit", compact('post', 'users'));
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param storePostRequest $request
     * @param $slugString
     * @return RedirectResponse
     */
    public function update(storePostRequest $request, $slugString): RedirectResponse
    {
        $post = Post::findBySlug($slugString);
        $request->slug = $request->title;
        $upd = $post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slugString
     * @return bool
     * @throws Exception
     */
    public function destroy($slugString): bool
    {
        if (\request()->ajax()) {
            $post = Post::findBySlug($slugString);
            return $post->delete();
        }
    }
}
