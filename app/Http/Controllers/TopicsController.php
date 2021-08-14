<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $topics=Topic::withOrder($request->order)->with('user','category')->paginate(10);
        return view('topics.index',compact('topics'));
    }
    public function create()
    {
        return 'create';
    }
    public function store()
    {

    }
}
