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
use Illuminate\Support\Facades\Auth;
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

        $data = DB::table('table_products')
        ->where('category_id', $id)
        ->get();

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
                    <a class="pronb-img scale-img" href= chi-tiet-san-pham/'.$v->slug.'/'.$v->id.' >
                        <img src='.asset("http://localhost:8000/storage/$v->photo").' alt="" width="365"
                            height="365" />
                    </a>
                    <a class="pronb-img1 scale-img" href= chi-tiet-san-pham/'.$v->slug.'/'.$v->id.' >
                        <img src='.asset("http://localhost:8000/storage/$v->photo1").' alt="" width="365"
                            height="365" />
                    </a>

                    <div class="pronb-btn">
                        <a href='.route('cart.add',$v->id).' class="add-to-cart d-block">
                            Thêm vào giỏ hàng
                        </a>
                        <a href="" class="buynow d-block">
                            mua ngay
                        </a>
                    </div>
                </div>
                <div class="pronb-info">
                    <h3 class="mb-0">
                        <a class="pronb-name text-split" href= chi-tiet-san-pham/'.$v->slug.'/'.$v->id.'>
                            '.$v->name.'
                        </a>
                    </h3>
                    <div class="pronb-price">
                        <span class="price-new">  '.number_format($v->sale_price).'  </span>
                        <span class="price-old"> '.number_format($v->regular_price).' </span>
                        <span class="discount"> '.$v->discount.'%</span>
                    </div>
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

    public function san_pham()
    {
        $product = DB::table('table_products')->paginate(8);

        return view('template.product.product',compact([
            'product',
        ]));
    }

    public function chi_tiet_san_pham(Request $request,$slug,$id)
    {
        $product = DB::table('table_products')->paginate(8);

        $rowDetail = DB::table('table_products')
        ->where('slug', $slug)
        ->get();

        // dd($rowDetail);

        $rowDetailPhoto = DB::table('table_product_details')
        ->where('product_id', $id)
        ->get();
        // dd($rowDetailPhoto);

        return view('template.product.detail',compact([
            'rowDetailPhoto',
            'rowDetail',
            'product',
        ]));
    }

}