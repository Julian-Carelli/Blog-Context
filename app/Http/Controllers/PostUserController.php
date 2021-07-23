<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostUserController extends Controller
{
    protected $paginator;

    public function __construct()
    {
        $this->paginator =  Paginator::useBootstrap();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('postsUsers.show', [
            'posts' => $posts,
            'user'  => $user,
        ]);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
