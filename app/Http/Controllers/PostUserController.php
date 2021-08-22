<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostUserController extends Controller
{
    protected $paginator;
    protected $category;
    protected $post;

    public function __construct()
    {
        $this->middleware('auth');
        $this->paginator =  Paginator::useBootstrap();
        $this->category = new Category;
        $this->post = new Post;
    }

    public function index()
    {
        $user = Auth::user();
        $posts = $this->post->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('postsUsers.index', [
            'posts' => $posts,
            'user'  => $user,
        ]);
    }

    public function create(User $user)
    {
        $categories = $this->category->all();

        return view('postsUsers.create',[
            'categories' => $categories
        ]);

    }

    public function store(PostRequest $request)
    {
        $user = Auth::user();
        $category = $this->category->where('title', strtolower($request->category))->first();
        $uploadedFileUrl = null;
        $publicIdFile = null;

        if ($request->image && env('APP_ENV') == 'production') {
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $publicIdFile = cloudinary()->getPublicId();
        }

        $post = $this->post->create(
            [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'status_posts_id' => 3,
                'image' => $uploadedFileUrl ? $uploadedFileUrl : $request->image,
                'key_image' => $publicIdFile ? $publicIdFile : 'disable',
            ] + $request->validated()
        );

        if ($request->image && env('APP_ENV') == 'local') {
            $post->image = $request->image->store('posts', 'public');
            $post->save();
        }

        return redirect('/' . $user->slug. '/post')->with('status', 'Post creado con exito');
    }
    public function show(User $user)
    {
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
