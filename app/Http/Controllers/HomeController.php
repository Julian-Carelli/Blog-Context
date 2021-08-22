<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\CategoryUser;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Auth;

class HomeController extends Controller
{
    protected $paginator;
    protected $categoryUser;
    protected $category;
    protected $user;
    protected $post;

    public function __construct()
    {
        $this->paginator =  Paginator::useBootstrap();
        $this->categoryUser = new CategoryUser;
        $this->category = new Category;
        $this->post = new Post;
        $this->user = new User;
    }

    public function index()
    {
        $user = Auth::user();
        $userExist = $this->user->where('id', $user->id)
        ->where('is_validate', 1)->first();

        if (!$userExist) {
            $categories = $this->category->all();
            return view('categories.index', [
                'categories' => $categories
            ]);
        }
        if ($user->id == 1) {
            $posts = $this->post->latest()->orderBy('created_at', 'desc');
            return view('dashboard', [
                'posts' => $posts->paginate(10)
            ]);
        }

        $allCategoryUser = $this->categoryUser->where('user_id', $user->id)->get();
        $postCategoryForUser = [];
        foreach($allCategoryUser as $item){
            $allPostUser = $this->post->where('category_id', $item->category->id)->first();
            array_push($postCategoryForUser, $allPostUser);
        }
        return view('postsValidation.show', [
            'posts' => $postCategoryForUser
        ]);
    }

    public function home()
    {
        return view('home');
    }
}
