<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\CategoryUser;
use App\Models\Category;
use App\Models\User;

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
        $userExist = User::where('id', auth()->user()->id)
        ->where('is_validate', 1)->first();
        $allCategoryUser = CategoryUser::where('user_id', auth()->user()->id)->get();
        $postCategoryForUser = [];

        foreach($allCategoryUser as $item){
            $allPostUser = Post::where('category_id', $item->category->id)->first();
            array_push($postCategoryForUser, $allPostUser);
        }

        if (auth()->user()->id == 1) {
            $posts = Post::latest();
            $postOrdered = $posts->orderBy('created_at', 'desc');
            return view('dashboard', [
                'posts' => $postOrdered->paginate(10)
            ]);
        }

        if (!$userExist) {
            $categories = Category::all();
            return view('categories.index', [
                'categories' => $categories
            ]);
        }

        return view('postsValidation.show', [
            'posts' => $postCategoryForUser
        ]);
    }
}
