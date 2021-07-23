<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Post;

class HomeController extends Controller
{
    protected $paginator;

    public function __construct()
    {
        $this->middleware('auth');
        $this->paginator =  Paginator::useBootstrap();
    }

    public function index()
    {
        $posts = Post::latest();
        $postOrdered = $posts->orderBy('created_at', 'desc');
        return view('dashboard', [
            'posts' => $posts->paginate(10)
        ]);
    }
}
