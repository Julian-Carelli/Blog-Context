<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class PostUserController extends Controller
{
    protected $paginator;

    public function __construct()
    {
        $this->middleware('auth');
        $this->paginator =  Paginator::useBootstrap();
    }

    public function index()
    {
    }

    public function create(User $user)
    {
        $categories = Category::all();

        return view('postsUsers.create',[
            'categories' => $categories
        ]);

    }

    public function store(PostRequest $request)
    {
        $category = Category::where('title', strtolower($request->category))->first();
        $post = Post::create(
            [
                'user_id' => auth()->user()->id,
                'category_id' => $category->id,
                'status_posts_id' => 3,
                'image' => $request->image ? $request->image : null,
            ] + $request->validated()
        );

        if($request->image){
            $post->image = $request->image->store('posts', 'public');
            $post->save();
        }

        return redirect('/' . auth()->user()->id. '/post')->with('status', 'Post creado con exito');
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
