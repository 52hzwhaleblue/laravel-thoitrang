<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\TableOrderDetail;
use App\Models\TableProductDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\TableCategory;
use App\Models\TableProduct;
use App\Http\Controllers\Api\BaseController as BaseController;
use Excel;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
    public function index()
    {
        $data = TableProduct::orderBy('created_at', 'DESC')->get();
        return view('admin.template.product.man.man',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $splist = TableCategory::all();
        return view('admin.template.product.man.man_add',compact('splist'));
    }

    public function store(Request $request)
    {
        $url = $this->uploadPhoto($request,"products/",415,655);
        $url1 = $this->uploadPhoto1($request,"products/",415,655);
        $sizes = explode(" ",$request->get('sizes'));
        $properties_data = [
            'sizes'=>$sizes,
            'origin'=> 'Vietnam',
        ];

        $product = new TableProduct();
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->content = $request->get('content');
        if ($request->has('photo')) {
            $product->photo = $url;
        }
        if ($request->has('photo1')) {
            $product->photo1 = $url1;
        }
        $product->category_id =(int)$request->get('category_id');
        if(empty($product->category_id)){
            return redirect()
                ->route('admin.product.product-man.index')
                ->with('warning', 'Vui lòng chọn danh mục cấp 1');
        }
        $product->status = (int)$request->get('status');
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
        $product->properties = $properties_data;
        $product->save();

        // Gọi hàm lưu table_product_detail với size,color,stock
        $colors = $request->get('color');
        $stocks = $request->get('stock');

        if($colors){
            foreach ($colors as $kcolor => $vcolor)
            {
                TableProductDetail::create([
                    'product_id' => $product->id,
                    'color' => $vcolor,
                    "stock" => $stocks[$kcolor],
                    "create_at" => now(),
                    "updated_at" => now(),
                ]);
            }
        }
        return redirect()
            ->route('admin.product.product-man.index')
            ->with('message', 'Bạn đã tạo sản phẩm thành công!');
    }

    public function edit($slug)
    {
        $data = TableProduct::where('slug', $slug)->first();
        $splist = TableCategory::all();

        $product_id = $data['id'];
        $product_properties = TableProductDetail::where('product_id',$product_id)->get();
        $sql_sizes = DB::table('table_products')->select('properties')->where('id',$product_id)->first();
        ($sql_sizes->properties != null)
            ? $sizes = implode(" ", json_decode($sql_sizes->properties)->sizes)
            : $sizes = null;


        return view(
            'admin.template.product.man.man_edit',
            compact('data','splist','product_properties','sizes')
        );
    }

    public function update(Request $request, $slug)
    {
        $url = $this->uploadPhoto($request,"products/",415,655);
        $url1 = $this->uploadPhoto1($request,"products/",415,655);

        $sizes = explode(" ",$request->get('sizes')); // explode từ string => array
        $properties_data = [
            'sizes'=>$sizes,
            'origin'=> 'Vietnam',
        ];

        $product = TableProduct::where('slug', $slug)->first();
        $product->status = (int)$request->get('status');
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->content = $request->get('content');
        $product->category_id =(int)$request->get('category_id');

        if(empty($product->category_id)){
            return redirect()
                ->route('admin.product.product-man.index')
                ->with('warning', 'Vui lòng chọn danh mục cấp 1');
        }
        if ($request->has('photo')) {
            $product->photo = $url;
        }
        if ($request->has('photo1')) {
            $product->photo1 = $url1;
        }

        $product->status = (int)$request->get('status');
        $product->slug = $request->get('slug');
        $product->code = $request->get('code');
        $product->regular_price = $request->get('regular_price');
        $product->sale_price = $request->get('sale_price');
        $product->discount = $request->get('discount');

        $checkSlug = Functions::checkSlug($product);
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
        $product->properties = $properties_data;
        $product->save();

        // Cập nhật color,stock chi tiết sản phẩm
//        $colors = $request->get('color');
//        $stock = $request->get('stock');
//
//        $product_id = DB::table('table_products')->select('id')->where('slug',$slug)->first();
//        dd($product_id);
//        $product_detail = TableProductDetail::where('product_id', $product_id->id)
//            ->where('color','=',null)
//            ->where('stock','=',null)
//        ; // khi delete thì product_detail ko dc ->get()
//
//        $dataProductDetail = null;
//        $product_detail->delete(); // khi delete thì product_detail ko dc ->get()
//
//        foreach ($colors as $k => $v) {
//            $dataProductDetail['color'] = $v;
//            $dataProductDetail['stock'] = $stock[$k];
//            DB::table('table_product_details')->insert([
//                'color' => $dataProductDetail['color'],
//                'stock' => $dataProductDetail['stock'],
//                'product_id' => $product_id,
//                'photo' => $product_id,
//
//            ]);
//        }
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
        return ;
    }

    public function import_view()
    {
        return view('admin.template.product.excel.import');
    }

    public function import_handle(Request $request)
    {
        $path = $request->file('file');

        if($path){
            Excel::import(new ProductsImport,$path);
            return redirect()->route('admin.product.product-man.index')->with('message', 'Bạn đã import file sản phẩm thành công!');
        }
        else{
            return redirect()->route('admin.product.importProduct')->with('warning', 'Vui lòng chọn file');
        }

    }

    public function export_handle()
    {
        return Excel::download(new ProductsExport(), 'products.csv',  \Maatwebsite\Excel\Excel::CSV,[
            'Content-Type' => 'text/csv',
        ], 'UTF-8');
    }
    public function deleteAll()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TableProduct::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->route('admin.product.product-man.index')->with('message', 'Bạn đã xóa tất cả sản phẩm thành công!');
    }

}
