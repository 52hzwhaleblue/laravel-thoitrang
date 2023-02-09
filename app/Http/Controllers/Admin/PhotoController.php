<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\TablePhoto;
use Functions;

class PhotoController extends Controller
{
    public function index()
    {
        $currentURI = Route::getFacadeRoot()->current()->uri();
        $com = explode('/', $currentURI);
        $type = $com[2];

        // Lấy dữ liệu với type
        $data = TablePhoto::where('type', $type)->get();
        return view('admin.template.photo.photo',compact('data','type'));
    }

    public function create()
    {
        return view('admin.template.photo.photo_add');
    }

    public function store(Request $request)
    {
        $count = TablePhoto::all()->count();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name =
                Date('Ymd') . '-' . 'slideshow' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name);
        }

        $photo = new TablePhoto();
        $photo->name = $request->get('name');
        $photo->photo = $file_name;
        $photo->type = $request->get('type');
        $photo->save();

        return redirect()
            ->route('admin.photo.photo.index')
            ->with('message', 'Bạn đã tạo (' . $request->get('type') . ') thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
