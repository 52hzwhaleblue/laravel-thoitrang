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
use App\Models\TableReview;

class ReviewController extends BaseController
{
    public function fetchData(){   
        try {    
            $product_id = request()->query('id_product');

            $page = request()->query('page',1);

            $limit = 6;
            
            $reviews = TableReview::with(['user','images'])
            ->where('product_id',$product_id)
            ->skip(($page-1)*$limit)
            ->take($limit)
            ->get();


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
