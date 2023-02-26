<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TablePhoto;
use App\Models\TableStatic;
use App\Models\TableProduct;
use App\Models\TableProductList;
use App\Models\TablePost;
use File;

class IndexController extends Controller
{
    public function index()
    {
        // slide,gioithieu,pronb,banner_sanpham,splistnb,bannerQC,album,postnb
        $slide = TablePhoto::where('type', 'slideshow')->get();
        $gioithieu = TableStatic::where('type', 'gioi-thieu')->first();
        $gioithieu_slide = TablePhoto::where('type', 'gioithieu-slide')->get();
        $banner_sanpham = TablePhoto::where('type', 'banner-sanpham')->get();
        $bannerQC = TablePhoto::where('type', 'banner-quangcao')->get();
        $album = TablePhoto::where('type', 'album')->get();

        $pronb = TableProduct::whereJsonContains('status', 'noibat')->get();
        $splistnb = DB::table('table_product_lists')
        ->whereJsonContains('status', "noibat,hienthi")
        ->get();

        // dd($gioithieu_slide);
        $postnb = TablePost::whereJsonContains('status', 'noibat')->get();



        return view('template.index.index',compact([
            'slide',
            'splistnb',
            'gioithieu',
            'gioithieu_slide',
        ]));
    }


    public function thumbs_img(Request $request)
    {
        $width =  $request->get('width');
        $height =  $request->get('height');

        $size = $width.'x'.$height;
        die($size);
        $path = public_path().'/thumbs/'.$size ;
        if(!file_exists($path)){
            File::makeDirectory($path);
        }


    }
}
