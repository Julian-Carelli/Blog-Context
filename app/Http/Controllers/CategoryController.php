<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CategoryUser;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request, User $user)
    {
        $array = $request->validated();
        $arrayCombined = array_keys($array);
        foreach($arrayCombined as $item){
            $categoryId = intval((substr($item, 9)));

            CategoryUser::create([
                'user_id' => $user->id,
                'category_id' => $categoryId
            ]);
        }

        User::where('id', $user->id)->update(['is_validate' => 1]);

        return redirect()->route('postsValidation.show');
    }
}
