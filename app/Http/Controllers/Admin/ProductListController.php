<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableProductList;
use Illuminate\Support\Facades\DB;
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
        // if(!empty($request->get('slug'))){
        //     Functions::checkSlug($slug);
        // }

        $productList->name = $request->get('name');
        $productList->desc = $request->get('desc');
        $productList->content = $request->get('content');
        if ($request->has('photo')) {
            $productList->photo = $file_name;
        }
        $productList->status = implode(',', $request->get('status'));
        $productList->slug = $request->get('slug');

        // check slug
        // dd($productList->name);
        $checkSlug = Functions::checkSlug($productList);

        die($checkSlug );

        $productList->save();

        if ($checkSlug == 'exist') {
            // $response['messages'][] = 'Đường dẫn (' . $v . ') đã tồn tại';
            die('Đường dẫn (' . $request->get('slug'). ') đã tồn tại');
        } elseif ($checkSlug == 'empty') {
            // $response['messages'][] = 'Đường dẫn (' . $v . ') không được trống';
            die('Đường dẫn (' . $request->get('slug'). ') không được trống');
        }

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
        $fix_status = implode(',', $request->get('status'));
        if ($request->has('image')) {
            $file = $request->image;
            $ext = $request->image->extension();
            $file_name = Date('Ymd') . '-' . 'productList' . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name);
        } else {
            // $slug = $request->get('slug');

            // $sql = TableProductList::where('slug', $slug)->first();
            // $data = json_decode($sql, true);

            $file_name = '';
        }

        $productList = TableProductList::where('slug', $slug)->first();
        // dd($productList);
        $productList->slug = $request->get('slug');
        $productList->name = $request->get('name');
        $productList->desc = $request->get('desc');
        $productList->content = $request->get('content');
        if ($request->has('photo')) {
            $productList->photo = $file_name;
        }
        $productList->status = implode(',', $request->get('status'));

        $productList->save();

        return redirect()
            ->route('admin.product.product-list.index')
            ->with('message', 'Bạn đã cập nhật danh mục cấp 1 thành công!');
    }

    public function destroy($id)
    {
        //
    }
}
