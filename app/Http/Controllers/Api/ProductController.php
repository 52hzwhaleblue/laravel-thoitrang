<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use App\Models\TablePromotion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

class ProductController extends BaseController
{
    public function fetchAll(Request $request,DB $db){   
        try {     
            $page = request()->query('page');

            $type = request()->query('type',1);

            $limit = 8;
         
            $products = TableProduct::with(['category','productDetail'])
                ->withCount('orderDetail as sold')
                ->withAvg('reviews as star', 'star')
                ->when($type != 1,function($query) use ($type){
                    return $query->where('category_id',$type);
                })
                ->when($page > 0,function($query) use ($limit,$page){
                    $offset = ($page - 1) * $limit;
                    return $query->skip($offset);
                })
                ->take($limit)
                ->get()
                ->map(function ($product) {
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
    
    public function search(){
        try {    
            $keyword = request()->query('keyword');

            $page = request()->query('page');

            $limit = 8;

            $products = TableProduct::with(['category','productDetail'])
            ->withCount('orderDetail as sold')
            ->whereRaw("name LIKE '%$keyword%'")
            ->withAvg('reviews as star', 'star')
            ->when($page > 0,function($query) use ($limit,$page){
                $offset = ($page - 1) * $limit;
                return $query->skip($offset);
            })
            ->take($limit)
            ->get()
            ->map(function ($product) {
                $product->star =  (double)$product->star;
                $product->is_popular = $product->view > 350;
                 return $product;
            }); 
        

            return $this->sendResponse($products, "Fetch search successfully!!!");
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function fetchPromotion(){
        try{
            $page = request()->query('page');

            $limit = 5;

            $promotions = TablePromotion::when($page > 0,function($query) use ($limit,$page){
                $offset = ($page - 1) * $limit;
                return $query->skip($offset);
            })
            ->take($limit)
            ->get();

            return $this->sendResponse($promotions, "Fetch successfully!!!");

        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),500);
        }
    }

}
