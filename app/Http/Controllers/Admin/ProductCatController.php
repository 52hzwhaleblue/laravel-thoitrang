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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TableProductCat::all();
        return view('admin.template.product.cat.cat',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $splist = TableProductList::all();
        return view('admin.template.product.cat.cat_add',compact('splist'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $productCat->save();

        return redirect()
            ->route('admin.product.product-cat.index')
            ->with('message', 'Bạn đã tạo danh mục cấp 2 thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $sql = TableProductCat::where('slug', $slug)->first();
        $data = json_decode($sql, true);
        $splist = TableProductList::all();

        // dd($data);
        // Status
        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        // Lấy danh mục cấp 1 thuộc danh mục cấp 2


        return view(
            'admin.template.product.cat.cat_edit',
            compact('data', 'explodeStatus','splist')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableProductCat $productCat)
    {
        $productCat->delete();
        return redirect()->route('admin.product.product-cat.index')->with('message', 'Bạn đã xóa danh mục cấp 2 thành công!');
    }
}
