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
    public $width;
    public $height;
    public $name;
    public function __construct()
    {
        $this->name = 'Sản phẩm';
        $this->width = Functions::getThumbWidth($this->name);
        $this->height = Functions::getThumbHeight($this->name);

//        dd($this->width);
    }
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
        $url = $this->uploadPhoto($request,"products/",$this->width,$this->height);
        $url1 = $this->uploadPhoto1($request,"products/",$this->width,$this->height);

        $product = new TableProduct();
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
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
        $product->SKU = $request->get('SKU');

        $product->regular_price = $request->get('regular_price');
        $product->sale_price = $request->get('sale_price');
        $product->discount = $request->get('discount');
        $product->save();

        // Gọi hàm lưu table_product_detail với size,color,stock
        $colors = $request->get('color');
        $sizes =$request->get('size');
        $stocks = $request->get('stock');

        if($colors){
            foreach ($colors as $kcolor => $vcolor)
            {
                TableProductDetail::create([
                    'product_id' => $product->id,
                    'photo' => $url,
                    'color' => $vcolor,
                    "size" => $sizes[$kcolor],
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

        return view(
            'admin.template.product.man.man_edit',
            compact('data','splist','product_properties')
        );
    }

    public function update(Request $request, $slug)
    {
        $url = $this->uploadPhoto($request,"products/",$this->width,$this->height);
        $url1 = $this->uploadPhoto1($request,"products/",$this->width,$this->height);

        $product = TableProduct::where('slug', $slug)->first();
        $product->status = (int)$request->get('status');
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
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
        $product->SKU = $request->get('SKU');
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
        $product->save();

        // Gọi hàm lưu table_product_detail với size,color,stock
        $colors = $request->get('color');
        $sizes =$request->get('size');
        $stocks = $request->get('stock');

        $product_detail_properties = TableProductDetail::where('product_id',$product->id)->get();

        foreach ($product_detail_properties as $k => $v){
            DB::table('table_product_details')
                ->where('product_id', $product->id)
                ->where('color',$v->color)
                ->where('size',$v->size)
                ->where('stock',$v->stock)
                ->limit(1)
                ->update(array(
                    'color' => $colors[$k],
                    'size' => $sizes[$k],
                    'stock' => $stocks[$k],
                ));
        }

        return redirect()
            ->route('admin.product.product-man.index')
            ->with('message', 'Bạn đã cập nhật sản phẩm thành công!');
    }

    public function delete_thuoctinh(Request $request)
    {
        $product_id = (int)$request->get('product_id');
        $size = $request->get('size');
        $color = $request->get('color');
        $stock = (int)$request->get('stock');

        $product_detail = TableProductDetail::where('product_id',$product_id)
            ->where('size',$size)
            ->where('color',$color)
            ->where('stock',$stock)
            ->first();

        if ($product_detail){
            $product_detail->delete();
        }

        return true;
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
