<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePhoto;
use Functions;
use Image;

class PhotoController extends Controller
{
    public $config_status = ['noibat','hienthi'];

    public function index()
    {
        $type = Functions::getTypeByCom();
        $status = $this->config_status;

        // Lấy dữ liệu với type
        $data = TablePhoto::where('type', $type)->get();
        return view('admin.template.photo.photo',compact('data','type','status'));
    }

    public function create()
    {
        $type = Functions::getTypeByCom();
        return view('admin.template.photo.photo_add',compact('type'));
    }

    public function store(Request $request)
    {
        $count = TablePhoto::all()->count();
        $type = Functions::getTypeByCom();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/photo'), $file_name);
        }


        $photo = new TablePhoto();
        $photo->name = $request->get('name');
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

        $sql = TablePhoto::where('id',$id)->first();
        $data = json_decode($sql, true);

        // dd($data);
        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin..template.photo.photo_edit',
            compact('data', 'explodeStatus','type')
        );
    }

    public function update(Request $request, $id)
    {
        $type = Functions::getTypeByCom();

        $count = TablePhoto::all()->count();
        $fix_status = implode(',', $request->get('status'));
        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/photo'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $photo = TablePhoto::where('id', $id)->first();

        $photo->name = $request->get('name');
        if ($request->has('photo')) {
            $photo->photo = $file_name;
        }
        $photo->type = $type;
        $photo->status = implode(',', $request->get('status'));
        $photo->save();

        return redirect()
            ->route('admin.photo.'.$type.'.index')
            ->with('message', 'Bạn đã cập nhật '. $type .' thành công!');
    }

    public function destroy($id)
    {
        $type = Functions::getTypeByCom();

        $photo = TablePhoto::find($id);
        if($photo !=null){
            $photo->delete();
            return redirect()->route('admin.photo.'.$type.'.index')->with('message', 'Bạn đã xóa '.$type.' thành công!');
        }
    }
}
