<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        $categories = Category::latest();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $categoryChoosed = Category::where('title', $request->category)->first();
        $uploadedFileUrl = null;
        $publicIdFile = null;
        $keyImage = Post::where('id', $post->id)->first()->key_image;

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
            'image' => $uploadedFileUrl ? $uploadedFileUrl : $request->image,
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
        $keyImage = Post::where('id', $post->id)->first()->key_image;

        $keyImage && env('APP_ENV') == 'production' && cloudinary()->destroy($keyImage);

        env('APP_ENV') == 'local' && Storage::disk('public')->delete($post->image);

        $post->delete();

        return redirect()->back()->with('status', 'Eliminado con exito');
    }
}
