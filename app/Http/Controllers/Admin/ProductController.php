<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\TableProductList;
use App\Models\TableProductCat;
use App\Models\TableProduct;
use Functions;

class ProductController extends Controller
{
    public $config_status = ['noibat','hienthi'];

    public function index()
    {
        $data = TableProduct::all();
        $status = $this->config_status;

        return view('admin.template.product.man.man',compact('data','status'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $splist = TableProductList::all();
        $spcat = TableProductCat::all();

        return view('admin.template.product.man.man_add',compact('splist', 'spcat'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = TableProduct::all()->count();

        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'product' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }
        if ($request->has('photo1')) {
            $file1 = $request->photo1;
            $ext = $request->photo1->extension(); //lấy đuôi file png||jpg
            $file_name1 =
                Date('Ymd') . '-' . 'product1' . $count . '.' . $ext;
            $file1->move(public_path('backend/assets/img/products'), $file_name1); //chuyển file vào đường dẫn chỉ định
        }

        $product = new TableProduct();

        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->content = $request->get('content');
        if ($request->has('photo')) {
            $product->photo = $file_name;
        }
        if ($request->has('photo1')) {
            $product->photo1 = $file_name1;
        }
        $product->id_list = $request->get('id_list');
        $product->id_cat = $request->get('id_cat');

        $product->status = implode(',', $request->get('status'));
        $product->slug = $request->get('slug');
        $checkSlug = Functions::checkSlug($product);

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.product.product-man.create')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.product.product-man.create')
                ->with('warning', 'Đường dẫn không được trống');
        }
        $product->code = $request->get('code');
        $product->regular_price = $request->get('regular_price');
        $product->sale_price = $request->get('sale_price');
        $product->discount = $request->get('discount');

        // dd(json_decode($product,true));
        $product->save();

        return redirect()
            ->route('admin.product.product-man.index')
            ->with('message', 'Bạn đã tạo sản phẩm thành công!');
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
        $sql = TableProduct::where('slug', $slug)->first();
        $data = json_decode($sql, true);
        $splist = TableProductList::all();
        $spcat = TableProductCat::all();

        $status = $data['status'];
        $explodeStatus = explode(',', $status);

        return view(
            'admin.template.product.man.man_edit',
            compact('data', 'explodeStatus','splist','spcat')
        );
    }

    public function update(Request $request, $slug)
    {
        $count = TableProduct::all()->count();
        $fix_status = implode(',', $request->get('status'));
        if ($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension(); //lấy đuôi file png||jpg
            $file_name =
                Date('Ymd') . '-' . 'product' . $count . '.' . $ext;
            $file->move(public_path('backend/assets/img/products'), $file_name); //chuyển file vào đường dẫn chỉ định
        }
        if ($request->has('photo1')) {
            $file1 = $request->photo1;
            $ext = $request->photo1->extension(); //lấy đuôi file png||jpg
            $file_name1 =
                Date('Ymd') . '-' . 'product1' . $count . '.' . $ext;
            $file1->move(public_path('backend/assets/img/products'), $file_name1); //chuyển file vào đường dẫn chỉ định
        }

        $product = TableProduct::where('slug', $slug)->first();

        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->content = $request->get('content');
        $product->id_list = $request->get('id_list');
        $product->id_cat = $request->get('id_cat');
        if ($request->has('photo')) {
            $product->photo = $file_name;
        }
        if ($request->has('photo1')) {
            $product->photo1 = $file_name1;
        }
        $product->status = implode(',', $request->get('status'));
        $product->slug = $request->get('slug');

        $checkSlug = Functions::checkSlug($product);

        $product->code = $request->get('code');
        $product->regular_price = $request->get('regular_price');
        $product->sale_price = $request->get('sale_price');
        $product->discount = $request->get('discount');

        if ($checkSlug == 'exist') {
            return redirect()
                ->route('admin.product.product-man.index')
                ->with(
                    'warning',
                    'Đường dẫn (' . $request->get('slug') . ') đã tồn tại'
                );
        } elseif ($checkSlug == 'empty') {
            return redirect()
                ->route('admin.product.product-man.index')
                ->with('warning', 'Đường dẫn không được trống');
        }
        // dd(json_decode($product,true));
        $product->save();

        return redirect()
            ->route('admin.product.product-man.index')
            ->with('message', 'Bạn đã cập nhật sản phẩm thành công!');
    }

    public function destroy(Request $request,$id)
    {
        $products = TableProduct::find($id);
        if($products !=null){
            $products->delete();
            return redirect()->route('admin.product.product-man.index')->with('message', 'Bạn đã xóa sản phẩm thành công!');
        }

    }

    public function deleteAll(Request $request,$id)
    {
        dd('deleteAll');
    }

}
