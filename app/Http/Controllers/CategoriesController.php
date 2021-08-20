<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,User $user)
    {
        $topics=Topic::where('category_id',$category->id)->withOrder($request->order)->with('user','category')->paginate(10);
        // 活跃用户列表
        $active_users = $user->getActiveUsers();

        // 传参变量话题和分类到模板中
        return view('topics.index', compact('topics', 'category', 'active_users'));
    }
}
