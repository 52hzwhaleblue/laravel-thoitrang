<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableCategory;
use Functions;
use Config;
use App\Http\Controllers\Api\BaseController as BaseController;

class CategoryController extends BaseController
{

    public function index()
    {
        $data = TableCategory::all();
        return view('admin.template.product.list.list', compact('data'));
    }

    public function create()
    {
        return view('admin.template.product.list.list_add');
    }

    public function store(Request $request)
    {
        $count = TableCategory::all()->count();

        $url = $this->uploadPhoto($request,"categories/",415,655);


        DB::table('table_categories')->insert(["photo" => $url]);


        $Category = new TableCategory();

        $Category->name = $request->get('name');
        $Category->desc = $request->get('desc');
        $Category->content = $request->get('content');
        if ($request->has('photo')) {
            $Category->photo = $url;
        }
        $Category->status = (int)$request->get('status');
        $Category->slug = $request->get('slug');
        $checkSlug = Functions::checkSlug($Category);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.product.product-list.create')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.product.product-list.create')
                ->with('warning', 'Đường dẫn không được trống');
        }
        dd($Category);
        $Category->save();

        return redirect()
            ->route('admin.product.product-list.index')
            ->with('message', 'Bạn đã tạo danh mục cấp 1 thành công!');
    }

    public function show($id)
    {
        //
    }
    public function edit($slug)
    {
        $sql = TableCategory::where('slug', $slug)->first();
        $data = json_decode($sql, true);

        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin.template.product.list.list_edit',
            compact('data', 'explodeStatus')
        );
    }

    public function update(Request $request, $slug)
    {
        $count = TableCategory::all()->count();
        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'Category' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $Category = TableCategory::where('slug', $slug)->first();
        // dd($Category);
        $Category->name = $request->get('name');
        $Category->desc = $request->get('desc');
        $Category->status = (int)$request->get('status');
        $Category->content = $request->get('content');
        if ($request->has('photo')) {
            $Category->photo = $file_name;
        }
        $Category->slug = $request->get('slug');

        $checkSlug = Functions::checkSlug($Category);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.product.product-list.index')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.product.product-list.index')
                ->with('warning', 'Đường dẫn không được trống');
        }

        $Category->save();
        return redirect()
            ->route('admin.product.product-list.index')
            ->with('message', 'Bạn đã cập nhật danh mục cấp 1 thành công!');
    }

    public function destroy(TableCategory $Category)
    {
        $Category->delete();
        return redirect()->route('admin.product.product-list.index')->with('message', 'Bạn đã xóa danh mục cấp 1 thành công!');
    }
}
