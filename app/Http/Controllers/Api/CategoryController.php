<?php

namespace App\Http\Controllers\Api;

use App\Models\TableProduct;
use Illuminate\Http\Request;
use App\Models\TableCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

class CategoryController extends BaseController
{
    public function fetchCategories(){   
        try {     
            $categories = DB::table('table_categories')->select('id','name','name_vi','photo','created_at')->get();
            return $this->sendResponse($categories, "Fetch categories successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function fetchProductByCategory(){   
      
        try {     
            $page = request()->query('page');

            $cate = request()->query('cate',1);

            $limit = 10;

            $offset = ($page - 1) * $limit;

            $products = TableProduct::with(['category','productDetail'])
                ->Stock()
                ->withSum('orderDetail as sold','quantity')
                ->withAvg('reviews as star', 'star')
                ->when($cate != -1,function($query) use ($cate){
                    return  $query->where('category_id',$cate);
                })     
                ->skip($offset)
                ->take($limit)
                ->get()
                ->map(function ($product) {
                    $product-> star = (double)$product->star;

                    $product-> sold = (int)$product->sold;
        
                    $product->is_popular = $product->view > 50 && $product->sold > 3;
                     return $product;
                }); 
            
            
            return $this->sendResponse($products, "Fetch Product by category successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
