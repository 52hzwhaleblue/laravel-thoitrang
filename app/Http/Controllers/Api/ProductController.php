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
            $products = TableProduct::with(['category'])->get();
            $products->map(function ($product) {
                    $product->sold = intval( DB::table('order_details')
                    ->where('product_id', $product->id)
                    ->sum('quantity'));
                    // $product->newCollection = collect(['item1', 'item2', 'item3']);
                    $product->image_list = $product->productDetail->map(function ($detail) {
                        return [
                            "image" =>[
                                'url' => $detail->image->url,
                                'id' => $detail->image->id,
                            ]
                        ];
                    });
                    return $product;
            });
            return $this->sendResponse($products, "Fetch Product successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
