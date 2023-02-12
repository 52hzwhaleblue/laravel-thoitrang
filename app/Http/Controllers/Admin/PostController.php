<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePost;
use Functions;

class PostController extends Controller
{
    public $config_status = ['noibat','hienthi'];

    public function index()
    {
        $type = Functions::getTypeByCom();
        $status = $this->config_status;

        // Lấy dữ liệu với type
        $data = TablePost::where('type', $type)->get();
        return view('admin.template.post.post',compact('data','type','status'));
    }

    public function create()
    {
        $type = Functions::getTypeByCom();
        return view('admin.template.post.post_add',compact('type'));
    }

    public function store(Request $request)
    {
        $count = TablePost::all()->count();
        $type = Functions::getTypeByCom();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/post'), $file_name);
        }

        $post = new TablePost();
        $post->name = $request->get('name');
        $post->desc = $request->get('desc');
        $post->content = $request->get('content');
        if ($request->has('photo')) {
            $post->photo = $file_name;
        }
        $post->type = $type;
        $post->status = implode(',', $request->get('status'));

        $post->status = implode(',', $request->get('status'));
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
            ->with('message', 'Bạn đã tạo ' .$type. ' thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($slug)
    {
        $type = Functions::getTypeByCom();

        $sql = TablePost::where('slug',$slug)->first();
        $data = json_decode($sql, true);

        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin..template.post.post_edit',
            compact('data', 'explodeStatus','type')
        );
    }

    public function update(Request $request, $slug)
    {
        $count = TablePost::all()->count();
        $type = Functions::getTypeByCom();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/post'), $file_name);
        }

        $post = TablePost::where('slug', $slug)->first();
        $post->name = $request->get('name');
        $post->desc = $request->get('desc');
        $post->content = $request->get('content');
        if ($request->has('photo')) {
            $post->photo = $file_name;
        }
        $post->type = $type;
        $post->status = implode(',', $request->get('status'));
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
        $type = Functions::getTypeByCom();

        $photo = TablePost::find($id);
        if($photo !=null){
            $photo->delete();
            return redirect()->route('admin.post.'.$type.'.index')->with('message', 'Bạn đã xóa '.$type.' thành công!');
        }
    }
}
