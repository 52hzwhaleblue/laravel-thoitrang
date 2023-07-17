<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePost;
use Functions;
use Image;
use App\Http\Controllers\Api\BaseController as BaseController;

class PostController extends BaseController
{
    public $width;
    public $height;
    public $type;
    public $name;

    public function __construct() {
        $this->name = "Bài viết";
        $this->type = Functions::getTypeByComAdmin();
        $this->width = Functions::getThumbWidth($this->name);
        $this->height = Functions::getThumbHeight($this->name);
    }

    public function index()
    {
        $type = $this->type;

        // Lấy dữ liệu với type
        $data = TablePost::where('type', $type)->get();
        return view('admin.template.post.post',compact('data','type'));
    }

    public function create()
    {
        $type = $this->type;
        return view('admin.template.post.post_add',compact('type'));
    }

    public function store(Request $request)
    {
        $url = $this->uploadPhoto($request,"post/", $this->width, $this->height);
        $post = new TablePost();
        $post->name = $request->get('name');
        $post->desc = $request->get('desc');
        $post->content = $request->get('content');
        if ($request->has('photo')) {
            $post->photo = $url;
        }
        $post->type = $this->type;
        $post->slug = $request->get('slug');
        $checkSlug = Functions::checkSlug($post);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.post.'.$this->type.'.create')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.post.'.$this->type.'.create')
                ->with('warning', 'Đường dẫn không được trống');
        }

        $post->save();

        return redirect()
            ->route('admin.post.'.$this->type.'.index')
            ->with('message', 'Bạn đã tạo ' .$this->type. ' thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($slug)
    {
        $type = $this->type;

        $sql = TablePost::where('slug',$slug)->first();
        $data = json_decode($sql, true);

        return view(
            'admin..template.post.post_edit',
            compact('data','type')
        );
    }

    public function update(Request $request, $slug)
    {
        $type = $this->type;
        $url = $this->uploadPhoto($request,"post/", $this->width, $this->height);


        $post = TablePost::where('slug', $slug)->first();
        $post->name = $request->get('name');
        $post->desc = $request->get('desc');
        $post->content = $request->get('content');
        if ($request->has('photo')) {
            $post->photo = $url;
        }
        $post->type = $type;
        $post->slug = $request->get('slug');
        $checkSlug = Functions::checkSlug($post);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.post.'.$type.'.create')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.post.'.$type.'.create')
                ->with('warning', 'Đường dẫn không được trống');
        }
        $post->save();

        return redirect()
            ->route('admin.post.'.$type.'.index')
            ->with('message', 'Bạn đã cập nhật ' .$type. ' thành công!');
    }

    public function destroy($id)
    {
        $type = $this->type;

        $photo = TablePost::find($id);
        if($photo !=null){
            $photo->delete();
            return redirect()->route('admin.post.'.$type.'.index')->with('message', 'Bạn đã xóa '.$type.' thành công!');
        }
    }
}
