<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    protected $paginator;

    public function __construct()
    {
        $this->paginator =  Paginator::useBootstrap();
    }

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {

        $post->update([
            'title' => $request->title,
            'content'  => $request->content
        ]);


        return redirect('/dashboard')->with('status', 'Actualizado con exito');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with('status', 'Eliminado con exito');
    }
}
