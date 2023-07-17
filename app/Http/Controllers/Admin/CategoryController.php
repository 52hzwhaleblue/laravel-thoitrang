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
        $url = $this->uploadPhoto($request,"categories/",415,655);
        $Category = new TableCategory();

        $Category->name = $request->get('name');
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
        $url = $this->uploadPhoto($request,"categories/",415,655);

        $Category = TableCategory::where('slug', $slug)->first();
        $Category->name = $request->get('name');
        $Category->status = (int)$request->get('status');
        if ($request->has('photo')) {
            $Category->photo = $url;
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

    public function destroy(Request $request,$id)
    {
        $category = TableCategory::find($id);
        if($category !=null){
            $category->delete();
            return redirect()->route('admin.product.product-list.index')->with('message', 'Bạn đã xóa sản phẩm thành công!');
        }
        return ;
    }
}
