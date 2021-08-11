<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\CategoryUser;
use App\Models\User;

class CategoryUserController extends Controller
{
    protected $categoryUser;
    protected $user;

    public function __construct()
    {
        $this->categoryUser = new CategoryUser;
        $this->user = new User;
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

        return redirect()->route('postsValidation.show');
    }
}
