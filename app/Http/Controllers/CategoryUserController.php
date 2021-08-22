<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\CategoryUser;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Auth;

class CategoryUserController extends Controller
{
    protected $categoryUser;
    protected $category;
    protected $post;
    protected $user;

    public function __construct()
    {
        $this->categoryUser = new CategoryUser;
        $this->category = new Category;
        $this->post = new Post;
        $this->user = new User;
    }

    public function index($categoryTitle)
    {
        $user = Auth::user();
        $postCategoryForUser = [];
        $allCategoryUser = $this->categoryUser->where('user_id', $user->id)->get();
        $categoryUser = $this->category->where('title', str_replace('-', ' ',$categoryTitle))->first();
        $posts = $this->post->where('category_id', $categoryUser->id)
                            ->where('is_validate', 1)
                            ->where('status_posts_id', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
        $categoryUser = $this->categoryUser->where('user_id', $user->id)->get();

        array_push($postCategoryForUser, $posts);

        return view('postsValidation.show', [
            'posts' => $postCategoryForUser,
            'categories' => $allCategoryUser,
        ]);
    }

    public function store(CategoryRequest $request, User $user)
    {
        $array = $request->validated();
        $arrayCombined = array_keys($array);
        foreach($arrayCombined as $item){
            $categoryId = intval((substr($item, 9)));

            $this->categoryUser->create([
                'user_id' => $user->id,
                'category_id' => $categoryId
            ]);
        }

        $this->user->where('id', $user->id)->update(['is_validate' => 1]);

        return redirect()->route('postsValidation.index');
    }
}
