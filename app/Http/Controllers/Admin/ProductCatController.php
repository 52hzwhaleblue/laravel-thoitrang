<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableProductList;
use App\Models\TableProductCat;
use Functions;

class ProductCatController extends Controller
{
    public $config_status = ['noibat','hienthi'];

    public function index()
    {
        $data = TableProductCat::all();
        $status = $this->config_status;
        return view('admin.template.product.cat.cat',compact('data','status'));
    }

    public function create()
    {
        $splist = TableProductList::all();
        return view('admin.template.product.cat.cat_add',compact('splist'));
    }

    public function store(Request $request)
    {
        $count = TableProductCat::all()->count();


        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'productList' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $productCat = new TableProductCat();

        $productCat->id_list = $request->get('id_list');
        $productCat->name = $request->get('name');
        $productCat->desc = $request->get('desc');
        $productCat->content = $request->get('content');
        if ($request->has('photo')) {
            $productCat->photo = $file_name;
        }
        $productCat->status = implode(',', $request->get('status'));
        $productCat->slug = $request->get('slug');
        $checkSlug = Functions::checkSlug($productCat);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.product.product-cat.create')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.product.product-cat.create')
                ->with('warning', 'Đường dẫn không được trống');
        }
        // dd(json_decode($productCat,true));

        $productCat->save();

        return redirect()
            ->route('admin.product.product-cat.index')
            ->with('message', 'Bạn đã tạo danh mục cấp 2 thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($slug)
    {
        $sql = TableProductCat::where('slug', $slug)->first();
        $data = json_decode($sql, true);
        $splist = TableProductList::all();

        // Status
        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin.template.product.cat.cat_edit',
            compact('data', 'explodeStatus','splist')
        );
    }

    public function update(Request $request, $slug)
    {
        $count = TableProductCat::all()->count();
        $fix_status = implode(',', $request->get('status'));
        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'productCat' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }

        $productCat = TableProductCat::where('slug', $slug)->first();

        $productCat->name = $request->get('name');
        $productCat->desc = $request->get('desc');
        $productCat->content = $request->get('content');
        $productCat->id_list = $request->get('id_list');
        if ($request->has('photo')) {
            $productCat->photo = $file_name;
        }
        $productCat->status = implode(',', $request->get('status'));
        $productCat->slug = $request->get('slug');

        $checkSlug = Functions::checkSlug($productCat);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.product.product-cat.index')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.product.product-cat.index')
                ->with('warning', 'Đường dẫn không được trống');
        }

        $productCat->save();

        return redirect()
            ->route('admin.product.product-cat.index')
            ->with('message', 'Bạn đã cập nhật danh mục cấp 2 thành công!');
    }


    public function destroy(TableProductCat $productCat)
    {
        $productCat->delete();
        return redirect()->route('admin.product.product-cat.index')->with('message', 'Bạn đã xóa danh mục cấp 2 thành công!');
    }
}
