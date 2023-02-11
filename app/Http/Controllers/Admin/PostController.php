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

        $photo = new TablePost();
        $photo->name = $request->get('name');
        $photo->desc = $request->get('desc');
        $photo->content = $request->get('content');
        $photo->photo = $file_name;
        $photo->type = $type;
        $photo->status = implode(',', $request->get('status'));
        $photo->save();

        return redirect()
            ->route('admin.photo.'.$type.'.index')
            ->with('message', 'Bạn đã tạo ' .$type. ' thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $type = Functions::getTypeByCom();

        $sql = TablePost::where('id',$id)->first();
        $data = json_decode($sql, true);

        // dd($data);
        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin..template.post.post_edit',
            compact('data', 'explodeStatus','type')
        );
    }

    public function update(Request $request, $id)
    {
        $type = Functions::getTypeByCom();

        $count = TablePost::all()->count();
        $fix_status = implode(',', $request->get('status'));
        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/post'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $photo = TablePost::where('id', $id)->first();

        $photo->name = $request->get('name');
        $photo->desc = $request->get('desc');
        $photo->content = $request->get('content');
        if ($request->has('photo')) {
            $photo->photo = $file_name;
        }
        $photo->type = $type;
        $photo->status = implode(',', $request->get('status'));
        $photo->save();

        return redirect()
            ->route('admin.post.'.$type.'.index')
            ->with('message', 'Bạn đã cập nhật '. $type .' thành công!');
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
