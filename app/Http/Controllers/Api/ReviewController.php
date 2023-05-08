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
    
            $limit = 4;
    
            $reviewQuery = TableReview::with(['user','images'])
                ->where('product_id',$product_id);
            
            $reviews = $reviewQuery
                ->when($page > 1,function($query) use ($limit,$page){
                    $offset = ($page - 1) * $limit;
                    return $query->skip($offset);
                })
                ->take($limit)
                ->get();
            
            if($page < 2){
                $length = $reviewQuery->count();
    
                $stars = [5, 4, 3, 2, 1];
        
                $list = $reviewQuery->selectRaw('COALESCE(star, 0) as star, COUNT(star) as count')
                    ->whereIn('star', $stars)
                    ->groupBy('star')
                    ->orderBy('star', 'desc');
        
                $dummy_stars = collect($stars)->diff($list->pluck('star'))->map(function($star){
                    return ['star' => $star, 'count' => 0];
                });
            
                $list = collect($list->get())->merge($dummy_stars);

             
        
                $response = [
                    "length" => $length,
                    "reviews" => $reviews,
                    "star_group" => $list,
                ];
                return $this->sendResponse($response, "Fetch reviews successfully!!!");
            }

            $response = [
                "length" => null,
                "reviews" => $reviews,
                "star_group" => null,
            ];

            return $this->sendResponse($response, "Fetch reviews successfully!!!");
           
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
