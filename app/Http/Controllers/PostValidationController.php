<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\CategoryUser;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostValidationController extends Controller
{
    protected $paginator;
    protected $categoryUser;
    protected $post;
    protected $user;

    public function __construct(Post $post, User $user)
    {
        $this->middleware('auth');
        $this->paginator =  Paginator::useBootstrap();
        $this->categoryUser = new CategoryUser;
        $this->post = new Post;
        $this->user = new User;
    }

    public function index()
    {
        $user = Auth::user();
        $userExist = $this->user->where('id', $user->id)
        ->where('is_validate', 1)->first();
        $allCategoryUser = $this->categoryUser->where('user_id', $user->id)->get();
        $postCategoryForUser = [];
        $categorySearch = [];

        foreach($allCategoryUser as $key => $item){
            $filterPostUser = $this->post->where('category_id', $item->category->id)
                ->where('status_posts_id', 1)
                ->where('is_validate', 1)
                ->orderBy('created_at','DESC')
                ->get();
            $categorySearch[$key] = $item->category->id;
            array_push($categorySearch, $item->category->id);
            if (count($filterPostUser) > 0) {
                array_push($postCategoryForUser, $filterPostUser);
            }
        }

        $post = $this->post->whereNotIn('category_id', $categorySearch)
            ->where('status_posts_id', 1)
            ->where('is_validate', 1)
            ->orderBy('created_at','DESC')
            ->get();
        array_push($postCategoryForUser, $post);

        return view('postsValidation.show', [
            'posts' => $postCategoryForUser,
        ]);
    }

    public function requestPostValidation()
    {
        $posts = $this->post->where('is_validate', 0);
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

    }

    public function edit(Post $post)
    {
        //
    }

    public function updateRejectedState(Post $post)
    {
        $this->post->where('id', $post->id)->update(
            [
                'is_validate' => 1,
                'status_posts_id' => 2
            ],
        );

        return redirect()->back()->with(['rejected', 'Se rechazo con exito un post']);
    }

    public function updateApprovedState(Post $post)
    {
        $this->post->where('id', $post->id)->update(
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
