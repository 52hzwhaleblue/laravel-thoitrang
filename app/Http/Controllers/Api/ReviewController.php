<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Jobs\InsertReviewJob;
use Illuminate\Support\Facades\DB;
use App\Jobs\InsertReviewDetailJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class ReviewController extends BaseController
{
    public function fetchData(Request $request){   
        try {    
            $product_id = request()->query('id_product');

            $page = request()->query('page',1);
            $limit = 2;
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
                ->skip(2)
                ->take(PHP_INT_MAX)
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
            }
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function create(Request $request) {
        try {
            $order_id = $request->input('order_id');
            $content = $request->input('content');
            $star = $request->input('star');
            $files = $request->file('image');

            DB::beginTransaction();

            dispatch(new InsertReviewJob(
                Auth::id(),
                $order_id,
                $content,
                $star
            ));
    
            $reviews = DB::table('table_reviews')
                ->where('order_id', $order_id)
                ->get();
    
            if (!empty($files)) {
                $array_photo = array();

                $this->uploadFile($request, 'reviews/', 150, 150, function ($list_photo) use (&$array_photo) {
                    $array_photo = $list_photo;
                });

                foreach ($reviews as $review) {
                    dispatch(new InsertReviewDetailJob($review->id, $array_photo));
                }
            }
    
            DB::commit();
    
            return $this->sendResponse([], 'create reviews successfully!!!');

        } catch (\Throwable $th) {
            DB::rollback();
            return $this->sendError($th->getMessage(), 500);
        }
    }
    

    private function deleteFileReview(Request $request){

    }
}
