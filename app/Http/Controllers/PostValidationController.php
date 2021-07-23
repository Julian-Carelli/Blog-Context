<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Pagination\Paginator;

class PostValidationController extends Controller
{
    protected $paginator;

    public function __construct()
    {
        $this->paginator =  Paginator::useBootstrap();
    }

    public function index()
    {
        $posts = Post::where('is_validate', 0);
        $totalPosts = $posts->count();
        $postOrdered = $posts->orderBy('created_at', 'desc');

        return view('postsValidation.index', [
            'posts' => $postOrdered->paginate(10),
            'totalPosts' => $totalPosts,
        ]);
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
        $posts = Post::where('is_validate', 1)->where('status_posts_id', 1);
        $postOrdered = $posts->orderBy('created_at', 'desc');

        return view('postsValidation.show', [
            'posts' => $postOrdered->paginate(10),
        ]);
    }

    public function edit(Post $post)
    {
        //
    }

    public function updateRejectedState(Post $post)
    {
        Post::where('id', $post->id)->update(
            [
                'is_validate' => 1,
                'status_posts_id' => 2
            ],
        );

        return redirect()->back()->with(['rejected', 'Se rechazo con exito un post']);
    }

    public function updateApprovedState(Post $post)
    {
        Post::where('id', $post->id)->update(
            [
                'is_validate' => 1,
                'status_posts_id' => 1
            ],
        );

        return redirect()->back()->with(['approved', 'Se aprobo con exito un post']);
    }

    public function destroy(Post $post)
    {
        //
    }
}
