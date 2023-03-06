<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TableCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

class CategoryController extends BaseController
{
    public function fetchCategories(Request $request){   
        try {     
            $categories = DB::table('table_categories')->select('id','name','name_vi','photo')->get();
            return $this->sendResponse($categories, "Fetch categories successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
