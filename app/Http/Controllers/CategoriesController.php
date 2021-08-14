<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request)
    {
        $topics=Topic::where('category_id',$category->id)->withOrder($request->order)->with('user','category')->paginate(10);
        return view('topics.index', compact('topics', 'category'));
    }
}
