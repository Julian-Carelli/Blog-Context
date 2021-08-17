<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    protected $paginator;
    protected $category;
    protected $post;
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->paginator =  Paginator::useBootstrap();
        $this->category = new Category;
        $this->post = new Post;
        $this->user = new User;
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
        $categories = $this->category->latest();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $categoryChoosed = $this->category->where('title', strtolower($request->category))->first();
        $uploadedFileUrl = null;
        $publicIdFile = null;
        $keyImage = $this->post->where('id', $post->id)->first()->key_image;

        if ($request->image && env('APP_ENV') == 'production') {
            cloudinary()->destroy($keyImage);
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $publicIdFile = cloudinary()->getPublicId();
        }

        if ($request->image && env('APP_ENV') == 'local') {
            Storage::disk('public')->delete($post->image);
            $post->image = $request->image->store('posts', 'public');
            $post->save();
        }

        $post->update([
            'title' => $request->title,
            'content'  => $request->content,
            'category_id' => $categoryChoosed->id,
            'image' => $uploadedFileUrl ? $uploadedFileUrl : $post->image,
            'key_image' => $publicIdFile ? $publicIdFile : 'disable',
            'is_validate' => 0,
            'status_posts_id' => 3,
        ]);

        if (Auth::user()->id == 1) {
            return redirect('/dashboard')->with('status', 'Actualizado con exito');
        }

        return redirect('/'.Auth::user()->id.'/post')->with('status', 'Actualizado con exito');
    }

    public function destroy(Post $post)
    {
        $keyImage = $this->post->where('id', $post->id)->first()->key_image;

        $keyImage && env('APP_ENV') == 'production' && cloudinary()->destroy($keyImage);

        env('APP_ENV') == 'local' && Storage::disk('public')->delete($post->image);

        $post->delete();

        return redirect()->back()->with('status', 'Eliminado con exito');
    }
}
