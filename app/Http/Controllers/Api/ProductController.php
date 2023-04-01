<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableProduct;

class ProductController extends BaseController
{
    public function fetchAll(Request $request){   
        try {     
            $page = request()->query('page');
            $type = request()->query('type',1);
            $limit = 10;
            $offset = ($page - 1) * $limit;
            if($type ==1){
                $products = TableProduct::with(['category','productDetail'])
                ->offset($offset)->limit($limit)->get();
                $products->map(function ($product) {
                        $product->sold = intval( DB::table('table_order_details')
                        ->where('product_id', $product->id)
                        ->sum('quantity'));
                        $product->star =  DB::table('table_reviews')
                        ->where('product_id', $product->id)
                        ->average('star');
                        $product->is_popular =  $product->view > 350;
                        return $product;
                });  
            }else{
                $products = TableProduct::with(['category','productDetail'])
                ->where('category_id',$type)
                ->offset($offset)->limit($limit)->get();
                $products->map(function ($product) {
                        $product->sold = intval( DB::table('table_order_details')
                        ->where('product_id', $product->id)
                        ->sum('quantity'));
                        $product->is_popular =  $product->view > 350;
                        $product->star =  DB::table('table_reviews')
                        ->where('product_id', $product->id)
                        ->average('star');
                        return $product;
                });  
            }
            return $this->sendResponse($products, "Fetch Product successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function fetchPoppularSearch(Request $request){   
        try {     
            $page = request()->query('page',1);
            $limit = 4;
            $offset = ($page - 1) * $limit;
            $products = DB::table('table_products')
            ->where('view', '>=', 10)
            ->whereIn('id', function ($query) {
                $query->select('product_id')
                    ->from('table_order_details')
                    ->groupBy('product_id')
                    ->havingRaw('SUM(quantity) > 3');
            })
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
            return $this->sendResponse($products, "Fetch popular successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
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
