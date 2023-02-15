<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableStatic;
use Functions;

class StaticController extends Controller
{
    public $config_status = ['noibat','hienthi'];

    public function index()
    {
        $type = Functions::getTypeByCom();
        $status = $this->config_status;

        // Lấy dữ liệu với type
        $data = TableStatic::where('type', $type)->get();
        return view('admin.template.static.static',compact('data','type','status'));
    }

    public function create()
    {
        $type = Functions::getTypeByCom();
        return view('admin.template.static.static_add',compact('type'));
    }

    public function store(Request $request)
    {
        $count = TableStatic::all()->count();
        $type = Functions::getTypeByCom();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/static'), $file_name);
        }

        if ($request->has('photo1')) {
            $file1 = $request->photo1;
            $ext1 = $request->photo1->extension();
            $file_name1 =
                Date('Ymd') . '-' . $type . $count . '.' . $ext1;
            $file1->move(public_path('backend/assets/img/static'), $file_name1);
        }

        $static = new TableStatic();
        $static->name = $request->get('name');
        $static->desc = $request->get('desc');
        $static->content = $request->get('content');
        if ($request->has('photo')) {
            $static->photo = $file_name;
        }
        if ($request->has('photo1')) {
            $static->photo1 = $file_name1;
        }
        $static->type = $type;
        $static->save();

        return redirect()
            ->route('admin.static.'.$type.'.index')
            ->with('message', 'Bạn đã tạo ' .$type. ' thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $type = Functions::getTypeByCom();

        $sql = TableStatic::where('id',$id)->first();
        $data = json_decode($sql, true);

        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin.template.static.static_edit',
            compact('data', 'explodeStatus','type')
        );
    }

    public function update(Request $request, $slug)
    {
        $count = TableStatic::all()->count();
        $type = Functions::getTypeByCom();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name =
                Date('Ymd') . '-' . $type . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/static'), $file_name);
        }

        if ($request->has('photo1')) {
            $file1 = $request->photo1;
            $ext1 = $request->photo1->extension();
            $file_name1 =
                Date('Ymd') . '-' . $type . $count . '.' . $ext1;
            $file1->move(public_path('backend/assets/img/static'), $file_name1);
        }

        $static = TableStatic::where('id', $id)->first();
        $static->name = $request->get('name');
        $static->desc = $request->get('desc');
        $static->content = $request->get('content');
        if ($request->has('photo')) {
            $static->photo = $file_name;
        }
        if ($request->has('photo1')) {
            $static->photo1 = $file_name1;
        }
        $static->type = $type;
        $static->status = implode(',', $request->get('status'));
        $static->save();

        return redirect()
            ->route('admin.static.'.$type.'.index')
            ->with('message', 'Bạn đã cập nhật ' .$type. ' thành công!');
    }

    public function destroy($id)
    {
        $type = Functions::getTypeByCom();

        $photo = TableStatic::find($id);
        if($photo !=null){
            $photo->delete();
            return redirect()->route('admin.static.'.$type.'.index')->with('message', 'Bạn đã xóa '.$type.' thành công!');
        }
    }
}
