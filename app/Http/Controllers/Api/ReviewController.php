<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

class ReviewController extends BaseController
{
    public function fetchData(Request $request){   
        try {    
            $product_id = request()->query('id_product');

            $page = request()->query('page',1);
            $limit = 6;
            if($page == 1){
                $reviews = DB::table("table_reviews")
                ->where('product_id',$product_id)
                ->skip(0)->take($limit)
                ->get();
                $reviews->map(function($review){
                    $review->user = DB::table("table_users")
                                    ->where("id",$review->user_id)
                                    ->first();
                    $review->images = DB::table("table_review_detail")
                                    ->select("id","photo")
                                    ->where("review_id",$review->id)
                                    ->get();
                });

                return $this->sendResponse($reviews, "Fetch reviews successfully!!!");
            }else{
                $reviews = DB::table("table_reviews")
                ->where('product_id',$product_id)
                ->skip($limit)->get();

                return $this->sendResponse($reviews, "Fetch reviews successfully!!!");
            }
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
