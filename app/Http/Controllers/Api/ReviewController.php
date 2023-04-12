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
    public function fetchData(Request $request,DB $db){   
        try {    
            $product_id = request()->query('id_product');

            $page = request()->query('page',1);
            
            $limit = 8;

            $user_query = $db::table("table_users");

            $review_query = $db::table("table_reviews")->where('product_id',$product_id);

            $review_detail_query = $db::table("table_review_detail")->select("id","photo");

            $reviews = $review_query
            ->when($page > 1, function ($query) use ($page, $limit) {
                    $offset = ($page - 1) * $limit;
                    return $query->skip($offset);
            })
            ->take($limit)
            ->get();

            $reviews->map(function($review) use ($user_query,$review_detail_query){
                    $review->user = $user_query->where("id",$review->user_id)
                                    ->first();
                    $review->images = $review_detail_query
                                    ->where("review_id",$review->id)
                                    ->get();
            });

            return $this->sendResponse($reviews, "Fetch reviews successfully!!!");
           
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function create(Request $request,DB $db) {
        try {
            $order_id = $request->input('order_id');
            $content = $request->input('content');
            $star = $request->input('star');
            $files = $request->file('image');

            $db::beginTransaction();

            dispatch(new InsertReviewJob(
                Auth::id(),
                $order_id,
                $content,
                $star
            ));
    
            $reviews = $db::table('table_reviews')
                ->where('order_id', $order_id)
                ->get();
            
            if (!empty($files)) {
                $array_photo = array();

                $this->uploadFile($request, 'reviews/', 200, 200, function ($list_photo) use (&$array_photo) {
                    $array_photo = $list_photo;
                });

                foreach ($reviews as $review) {
                    dispatch(new InsertReviewDetailJob($review->id, $array_photo));
                }
            }
    
            $db::commit();
    
            return $this->sendResponse([], 'Rating successfully!!!');

        } catch (\Throwable $th) {
            $db::rollback();
            return $this->sendError($th->getMessage(), 500);
        }
    }
    
}
