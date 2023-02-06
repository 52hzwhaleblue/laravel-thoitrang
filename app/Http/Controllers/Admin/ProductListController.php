<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableProductList;
use Functions;

class ProductListController extends Controller
{
    public function index()
    {
        $data = TableProductList::all();
        return view('admin.template.product.list.list', compact('data'));
    }

    public function create()
    {
        return view('admin.template.product.list.list_add');
    }

    public function store(Request $request)
    {
        $count = TableProductList::all()->count();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'productList' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $productList = new TableProductList();

        $productList->name = $request->get('name');
        $productList->desc = $request->get('desc');
        $productList->content = $request->get('content');
        if ($request->has('photo')) {
            $productList->photo = $file_name;
        }
        $productList->status = implode(',', $request->get('status'));
        $productList->slug = $request->get('slug');
        $checkSlug = Functions::checkSlug($productList);

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
        $productList->save();

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
        $sql = TableProductList::where('slug', $slug)->first();
        $data = json_decode($sql, true);
        // dd($data);
        // Status
        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin.template.product.list.list_edit',
            compact('data', 'explodeStatus')
        );
    }

    public function update(Request $request, $slug)
    {
        $count = TableProductList::all()->count();
        $fix_status = implode(',', $request->get('status'));
        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'productList' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $productList = TableProductList::where('slug', $slug)->first();
        // dd($productList);
        $productList->name = $request->get('name');
        $productList->desc = $request->get('desc');
        $productList->content = $request->get('content');
        if ($request->has('photo')) {
            $productList->photo = $file_name;
        }
        $productList->status = implode(',', $request->get('status'));
        $productList->slug = $request->get('slug');

        $checkSlug = Functions::checkSlug($productList);

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

        $productList->save();

        return redirect()
            ->route('admin.product.product-list.index')
            ->with('message', 'Bạn đã cập nhật danh mục cấp 1 thành công!');
    }

    public function destroy(TableProductList $productList)
    {
        $productList->delete();
        return redirect()->route('admin.product.product-list.index')->with('message', 'Bạn đã xóa danh mục cấp 1 thành công!');
    }
}
