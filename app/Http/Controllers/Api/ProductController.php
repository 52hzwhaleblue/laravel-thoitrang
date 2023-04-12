<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableProduct;

class ProductController extends BaseController
{
    public function fetchAll(Request $request,DB $db){   
        try {     
            $page = request()->query('page');

            $type = request()->query('type',1);

            $limit = 10;
            
            $offset = ($page - 1) * $limit;
         
            $products = TableProduct::with(['category','productDetail'])
                ->withCount('orderDetail as sold')
                ->withAvg('reviews as star', 'star')
                ->when($type != 1,function($query) use ($type){
                    return $query->where('category_id',$type);
                })
                ->offset($offset)->limit($limit)
                ->get();
                
            $products->map(function ($product) {
                    $product->star =  (double)$product->star;
                    $product->is_popular = $product->view > 350;
                     return $product;
            });  
          
            return $this->sendResponse($products, "Fetch Product successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function fetchPoppular(Request $request)
    {
        try {
            $limit = 4;
    
            $products = TableProduct::with(['orderDetail', 'productDetail', 'category'])
                ->popular()
                ->take($limit)
                ->get();
               
            return $this->sendResponse($products, "Fetch popular successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
    }


    public function getDetail(){
        try{
            $id = request()->query('id_product');

            $product = TableProduct::with(["productDetail"])
             ->withCount('orderDetail as sold')
                ->withAvg('reviews as star', 'star')
            ->find($id);

            $product->star =  (double)$product->star;
            
            $product->is_popular = $product->view > 350;

            return $this->sendResponse($product, "Get successfully!!!");
        }catch(\Throwable $th){
            return $this->sendError($th->getMessage(), 500);
        }

    }
    

    public function search(Request $request){
        try {    
            $keyword = request()->query('keyword');
            $page = request()->query('page');
            $limit = 8;
            $offset = ($page - 1) * $limit;

            $products = DB::table('table_products')
            ->whereRaw("name LIKE '%".$keyword."%' COLLATE utf8mb4_unicode_ci")
            ->skip($offset)
            ->take($limit)
            ->get()
            ->map(function($product) {
                $product->sold = intval( DB::table('table_order_details')
                ->where('product_id', $product->id)
                ->sum('quantity'));
                $product->properties = json_decode($product->properties, true);
                $product->product_detail = DB::table('table_product_details')->where('product_id',$product->id)->select('id','photo')->get();
                $product->category = DB::table('table_categories')->select('id','photo','name','name_vi')->find($product->category_id);
                return $product;
            });

            return $this->sendResponse($products, "Fetch search successfully!!!");
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
