<?php

namespace App\Http\Controllers;

use File;
use App\Models\TablePost;
use App\Models\TablePhoto;
use App\Models\TableStatic;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use App\Models\TableCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as ABC;

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

        $pronb = TableProduct::where('status', 1)->get();
        $splistnb = TableCategory::where('status', 1)->get();
        $postnb = TablePost::where('status', 1)->get();

        // dd($pronb);

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

        $data = TableProduct::where('category_id', $id)->get();

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
            <div class="pronb-item" data-aos="fade-up" data-aos-duration="1500">
                <div class="pronb-image">
                    <a class="pronb-img scale-img hover_sang3" href= '.$v->slug.' >
                        <img src='.asset("backend/assets/img/products/$v->photo").' alt="" width="365"
                            height="365" />
                    </a>
                    <a class="pronb-img1 scale-img hover_sang3" href= '.$v->slug.'>
                        <img src='.asset("backend/assets/img/products/$v->photo1").' alt="" width="365"
                            height="365" />
                    </a>
                </div>
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
            ABC::makeDirectory($path);
        }
    }

    public function san_pham()
    {
        $product = DB::table('table_products')->paginate(8);

        return view('template.product.product',compact([
            'product',
        ]));
    }

    public function chi_tiet_san_pham($slug)
    {
        $product = DB::table('table_products')->paginate(8);
        $product_detail = DB::table('table_products')
        ->where('slug', $slug)
        ->get();
        // dd($product_detail);

        return view('template.product.detail',compact([
            'product_detail',
            'product',
        ]));
    }
}
