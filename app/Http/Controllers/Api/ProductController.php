<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TablePost;
use App\Models\TableProduct;

class ProductController extends BaseController
{
    public function fetchAll(Request $request){   
        try {     
            $page = request()->query('page'); // Lấy query param page, mặc định là 1 nếu không có
            $limit = request()->query('limit',5);
            $offset = ($page - 1) * $limit; // Lấy query param limit, mặc định là 10 nếu không có
            $products = TableProduct::with(['category','productDetail'])->offset($offset)->limit($limit)->get();
            $products->map(function ($product) {
                    $product->sold = intval( DB::table('table_order_details')
                    ->where('product_id', $product->id)
                    ->sum('quantity'));
                    return $product;
            });  
            return $this->sendResponse($products, "Fetch Product successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
