<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePhoto;
use Functions;
use Image;
use App\Http\Controllers\Api\BaseController as BaseController;

class PhotoController extends BaseController
{
    public $width;
    public $height;
    public $type;

    public function __construct() {
        $this->type = Functions::getTypeByCom();
        $this->width = Functions::getThumbWidth($this->type);
        $this->height = Functions::getThumbHeight($this->type);
    }

    public function index()
    {
        // Lấy dữ liệu với type
        $type = $this->type;
        $data = TablePhoto::where('type', $this->type)->get();
        return view('admin.template.photo.photo',compact('data','type'));
    }

    public function create()
    {
        $type = Functions::getTypeByCom();
        return view('admin.template.photo.photo_add',compact('type'));
    }

    public function store(Request $request)
    {
        $count = TablePhoto::all()->count();
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
            ->route('admin.photo.'.$this->type.'.index')
            ->with('message', 'Bạn đã tạo ' .$this->type. ' thành công!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $type = Functions::getTypeByCom();
        $sql = TablePhoto::where('id',$id)->first();
        $data = json_decode($sql, true);
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
        $url = $this->uploadPhoto($request,"photo/", $this->width, $this->height);
        $photo = TablePhoto::where('id', $id)->first();

        $photo->name = $request->get('name');
        $photo->desc = $request->get('desc');
        $photo->content = $request->get('content');
        if ($request->has('photo')) {
            $photo->photo = $url;
        }
        $photo->type = $type;
        $photo->status = (int) $request->get('status');
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
