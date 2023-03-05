<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableCategory;
use Functions;
use Config;

class CategoryController extends Controller
{
    public $config_status = ['noibat','hienthi'];

    public function index()
    {
        $data = TableCategory::all();
        $status = $this->config_status;
        return view('admin.template.product.list.list', compact('data','status'));
    }

    public function create()
    {
        return view('admin.template.product.list.list_add');
    }

    public function store(Request $request)
    {
        $count = TableCategory::all()->count();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'Category' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $Category = new TableCategory();

        $Category->name = $request->get('name');
        $Category->desc = $request->get('desc');
        $Category->content = $request->get('content');
        if ($request->has('photo')) {
            $Category->photo = $file_name;
        }
        $Category->status = implode(',', $request->get('status'));
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
        $count = TableCategory::all()->count();
        $fix_status = implode(',', $request->get('status'));
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
        $Category->content = $request->get('content');
        if ($request->has('photo')) {
            $Category->photo = $file_name;
        }
        $Category->status = implode(',', $request->get('status'));
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
