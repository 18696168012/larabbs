<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\Link;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class TopicsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index(Request $request,User $user,Link $link)
    {
        $topics=Topic::withOrder($request->order)->with('user','category')->paginate(10);
        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();

        return view('topics.index', compact('topics', 'active_users', 'links'));
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
    public function show(Topic $topic,Request $request)
    {
        // URL 矫正
        if ( ! empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }
        return view('topics.show',compact('topic'));
    }
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {

        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
    public function edit(Topic $topic)
    {
        //dd($topic->id);
        $this->authorize('update',$topic);
        $categories=Category::all();
        return view('topics.create_and_edit',compact('topic','categories'));
    }
    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());

        return redirect()->route('topics.show', $topic->id)->with('success', '更新成功！');
    }
    public function destroy(Topic $topic)
    {
        $this->authorize('destroy',$topic);
        $topic->delete();
        return redirect()->route('topics.index')->with('success', '成功删除！');
    }
}
