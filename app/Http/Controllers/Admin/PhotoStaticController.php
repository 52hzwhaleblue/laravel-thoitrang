<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePhoto;
use Functions;
use Image;
use App\Http\Controllers\Api\BaseController as BaseController;

class PhotoStaticController extends BaseController
{
    public $width;
    public $height;
    public $type;
    public $name;

    public function __construct() {
        $this->name = "Hình ảnh Tĩnh";
        $this->type = Functions::getTypeByComAdmin();
        $this->width = Functions::getThumbWidth($this->name);
        $this->height = Functions::getThumbHeight($this->name);
    }

    public function index()
    {
        // Lấy dữ liệu với type
        $type = $this->type;
        $data = TablePhoto::where('type', $type)->first();
        // dd($data);
        // dd(count($data));
        return view('admin.template.photo_static.photo_static',compact('data','type'));
    }

    public function create()
    {
        $type = $this->type;
        return view('admin.template.photo_static.photo_static_add',compact('type'));
    }

    public function store(Request $request)
    {
        $url = $this->uploadPhoto($request,"photo/", $this->width, $this->height);

        $photo = new TablePhoto();
        $photo->name = $request->get('name');
        $photo->desc = $request->get('desc');
        $photo->content = $request->get('content');
        if ($request->has('photo')) {
            $photo->photo = $url;
        }
        $photo->type = $this->type;
        $photo->status = (int)$request->get('status');
        $photo->save();

        return redirect()
            ->route('admin.photo-static.'.$this->type.'.index')
            ->with('message', 'Bạn đã tạo ' .$this->type. ' thành công!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $type = $this->type;
        $data = TablePhoto::where('id', $id)->get();

        // $data = json_decode($sql, true);


        return view(
            'admin..template.photo_static.photo_static_edit',
            compact('data','type')
        );
    }

    public function update(Request $request, $id)
    {
        $url = $this->uploadPhoto($request,"photo/", $this->width, $this->height);
        $photo = TablePhoto::where('id', $id)->first();

        $photo->name = $request->get('name');
        $photo->desc = $request->get('desc');
        $photo->content = $request->get('content');
        if ($request->has('photo')) {
            $photo->photo = $url;
        }
        $photo->type = $this->type;
        $photo->status = (int) $request->get('status');
        $photo->save();

        return redirect()
            ->route('admin.photo-static.'.$this->type.'.index')
            ->with('message', 'Bạn đã cập nhật '. $this->type .' thành công!');
    }

    public function destroy($id)
    {
        $photo = TablePhoto::find($id);
        if($photo !=null){
            $photo->delete();
            return redirect()->route('admin.photo-static.'.$this->type.'.index')->with('message', 'Bạn đã xóa '.$this->type.' thành công!');
        }
    }
}
