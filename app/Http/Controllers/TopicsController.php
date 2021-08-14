<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Auth;
class TopicsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index(Request $request)
    {
        $topics=Topic::withOrder($request->order)->with('user','category')->paginate(10);
        return view('topics.index',compact('topics'));
    }
    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
    }
    public function store(TopicRequest $request,Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id=Auth::id();
        $topic->save();
        return redirect()->route('topics.show',$topic->id)->with('success','帖子创建成功');
    }
    public function show()
    {
        return 1;
    }
}
