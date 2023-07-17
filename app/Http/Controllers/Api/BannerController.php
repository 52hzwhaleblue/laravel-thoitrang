<?php

namespace App\Http\Controllers\Api;

use App\Models\TablePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

class BannerController extends BaseController
{
    public function fetchBanner (){
        $banners =  DB::table('table_photos')->where('type','slideshow')->select('id','photo')->get();

        return $this->sendResponse($banners,"fetch banner successfully");
    }
}
