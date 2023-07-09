<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use App\Models\TablePromotion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

class ProductController extends BaseController
{
   
    public function fetchAll(Request $request){   
        try {     
            $page = $request->query('page');

            $limit = 10;
         
            $products = TableProduct::with(['category','productDetail'])
                ->Stock()
                ->withCount('orderDetail as sold')
                ->withAvg('reviews as star', 'star')
                ->when($page > 0,function($query) use ($limit,$page){
                    $offset = ($page - 1) * $limit;
                    return $query->skip($offset);
                })
                ->take($limit)
                ->get()
                ->map(function ($product) {
                    $product->star =  (double)$product->star;
                    $product->is_popular = $product->view > 200 && $product->orderDetail->sum('quantity') > 5;
                     return $product;
                }); 
          
            return $this->sendResponse($products, "Fetch Product successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function fetchPoppular(Request $request){

        try {
            $page = $request->query('page',1);

            $limit = 10;

            $products = TableProduct::with(['category','productDetail','orderDetail'])
                ->Stock()
                ->Popular()
                ->withCount('orderDetail as sold')
                ->withAvg('reviews as star', 'star')
                ->when($page > 1, function($query) use ($page,$limit){
                    $offset = ($page - 1) * $limit;
                    return $query->skip($offset);
                })
                ->take($limit)
                ->get()
                ->map(function ($product) {
                    $product->star =  (double)$product->star;
                    $product->is_popular = true;
                     return $product;
                }); 
               
            return $this->sendResponse($products, "Fetch popular successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
    }

    public function fetchNewProduct(Request $request) {
        try {
            $page = $request->query('page',1);

            $limit = 10;

            $currentDate = Carbon::now(); 

            $threeMonthsAgo = $currentDate->copy()->subDays(30)->toDateString();

            $products = TableProduct::with(['category','productDetail'])
                ->withCount('orderDetail as sold')
                ->withAvg('reviews as star', 'star')
                ->whereDate('created_at', '>=', $threeMonthsAgo)
                ->when($page > 1, function($query) use ($page,$limit){
                    $offset = ($page - 1) * $limit;
                    return $query->skip($offset);
                })
                ->take($limit)
                ->get()
                ->map(function ($product) {
                    $product->star =  (double)$product->star;
                    $product->is_popular = false;
                     return $product;
                });
               
            return $this->sendResponse($products, "Fetch new product successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
    }

    public function getDetail(){
        try{
            $id = request()->query('id_product');

            $productQuery = new TableProduct();
            
            $product = $productQuery::with(["productDetail"])
            ->withCount('orderDetail as sold')
            ->withAvg('reviews as star', 'star')
            ->find($id);

            $product-> star=  (double)$product->star;
            
            $product->is_popular = $product->view > 350;

            $productQuery::where('id',$product->id)->update([
                "view" => $product->view + 1,
            ]);

            return $this->sendResponse($product, "Get successfully!!!");

            
        }catch(\Throwable $th){
            return $this->sendError($th->getMessage(), 500);
        }

    }
    
    public function search(Request $request){
        try {    
            $keyword = $request->query('keyword');

            if(empty($keyword)){
                return $this->sendResponse([], "Fetch search successfully!!!");
            }

            $products = TableProduct::with(['category','productDetail'])
            ->withCount('orderDetail as sold')
            ->whereRaw("name LIKE '%$keyword%'")
            ->withAvg('reviews as star', 'star')
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

            $limit = 8;

            $promotions = TablePromotion::when($page > 0,function($query) use ($limit,$page){
                $offset = ($page - 1) * $limit;
                return $query->skip($offset);
            })
            ->where('limit','>',0)
            ->take($limit)
            ->get();

            return $this->sendResponse($promotions, "Fetch successfully!!!");

        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function updateLimitPromo(TablePromotion $db){
        try{    
            $id = request()->input('id_promotion');
            $promo = $db::find($id);
            $db::where('id',$promo->id)->update(["limit" => $promo->limit - 1]);
            return $this->sendResponse([], "Update limit successfully!!!");
        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function fetchSaleProduct(){  
        try{    
         
            $page = request()->query('page',1);

            $limit = 10;

            $products = TableProduct::with(['category','productDetail'])
            ->withCount('orderDetail as sold')
            ->withAvg('reviews as star', 'star')
            ->when($page > 1, function($query) use ($page,$limit){
                $offset = ($page - 1) * $limit;
                return $query->skip($offset);
            })
            ->where('discount', '!=', null)
            ->take($limit)
            ->get()
            ->map(function ($product) {
                $product->star =  (double)$product->star;
                $product->is_popular = false;
                 return $product;
            });

            return $this->sendResponse($products, "Fetch product sale successfully!!!");

        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),500);
        }
    }

}
