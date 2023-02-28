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

        $pronb = TableProduct::whereJsonContains('status', 'noibat,hienthi')->get();
        $splistnb = TableProductList::whereJsonContains('status', 'noibat,hienthi')->get();


        // dd($pronb);
        $postnb = TablePost::whereJsonContains('status', 'noibat')->get();



        return view('template.index.index',compact([
            'slide',
            'splistnb',
            'gioithieu',
            'gioithieu_slide',
            'pronb',
        ]));
    }

    public function load_ajax_product(Request $request)
    {
        $id =  $request->get('id');
        $tenkhongdau =  $request->get('tenkhongdau');

        $data = TableProduct::where('id_list', $id)->get();

        $output = '
        <div class="owl-page owl-carousel owl-theme"
            data-xsm-items = "2:10"
            data-sm-items = "2:10"
            data-md-items = "3:10"
            data-lg-items = "3:10"
            data-xlg-items = "4:10"
            data-rewind = "1"
            data-autoplay = "1"
            data-loop = "0"
            data-lazyload = "0"
            data-mousedrag = "1"
            data-touchdrag = "1"
            data-smartspeed = "800"
            data-autoplayspeed = "800"
            data-autoplaytimeout = "5000"
            data-dots = "1"
            data-animations = ""
            data-nav = "1"
            data-navText = ""
            data-navcontainer = ".control-sanpham">
        ';
        foreach ($data as $k =>$v){
        $output .='
            <div>
                <img src='.asset("backend/assets/img/products/$v->photo").' alt="" width="365"
                    height="365" />
            </div>
        '
        ;
        }
        $output .='
            </div>
        ';


        return response()->json($output);

    }


    public function thumbs_img(Request $request)
    {
        $width =  $request->get('width');
        $height =  $request->get('height');

        $size = $width.'x'.$height;
        // die($size);
        $path = public_path().'/thumbs/'.$size ;
        if(!file_exists($path)){
            File::makeDirectory($path);
        }


    }
}
