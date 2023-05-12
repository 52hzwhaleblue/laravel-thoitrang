<?php

namespace App\Http\Controllers;

use App\Events\PusherEvent;
use App\Models\TableProductDetail;
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
use Illuminate\Support\Facades\Route;

use Functions;

class IndexController extends Controller
{
    public $type;

    public function __construct() {
        $this->type = Functions::getTypeByCom();
    }

    public function testPusher()
    {
        event(new PusherEvent("Khách hàng:"));
    }

    public function index(Request $request)
    {
        // slide,gioithieu,pronb,banner_sanpham,splistnb,bannerQC,album,postnb
        $gioithieu = TableStatic::where('type', 'gioi-thieu')->first();

        $gioithieu_slide = TablePhoto::where('type', 'gioithieu-slide')->get();
        $quangcao = TablePhoto::where('type', 'quang-cao')->get();
        $banner_sanpham = TablePhoto::where('type', 'banner-sanpham')->get();
        $bannerQC = TablePhoto::where('type', 'banner-quangcao')->first();
        $album = TablePhoto::where('type', 'thu-vien-anh')->get();

        $pronb = TableProduct::where('status', 1)->get();
        $splistnb = TableCategory::where('status', 1)->get();
        $dichvu = TablePost::where('type', 'dich-vu')->get();
        $tieuchi = TablePost::where('type', 'tieu-chi')->get();
        $tintuc = TablePost::where('type', 'tin-tuc')->get();


        // return $request->session()->all();

        return view('template.index.index',compact([
            'splistnb',
            'gioithieu',
            'gioithieu_slide',
            'pronb',
            'quangcao',
            'album',
            'dichvu',
            'tieuchi',
            'bannerQC',
            'tintuc',
        ]));
    }

    public function load_ajax_product(Request $request)
    {
        $id_category =  $request->get('id_category');
        $data = DB::table('table_products')
        ->where('category_id', $id_category)
        ->get();
        $product_properties = TableProductDetail::where('product_id',$id_category)->where('stock','>','0')->get();

        $product_sizes = TableProduct::find($id_category);
        $sizes = json_encode($product_sizes->properties["sizes"]);
        $sizes_decode = json_decode($sizes);

        return view('api.product',compact(['data','product_properties','sizes_decode']));
    }

    public function static()
    {
        $data = TableStatic::where('type', $this->type)->first();
        return view('template.static.static',compact('data'));
    }

    public function post()
    {
        $post = TablePost::where('type', $this->type)->paginate(8);
        return view('template.post.post',compact('post'));
    }

    public function post_detail($slug){
        $post = DB::table('table_posts')->paginate(8);

        $rowDetail = DB::table('table_posts')
        ->where('slug', $slug)
        ->first();

        return view('template.post.detail',compact([
            'rowDetail',
            'post',
        ]));
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

        $rowDetailPhoto = DB::table('table_product_details')
        ->where('product_id', $id)
        ->get();

        $product_properties = TableProductDetail::where('product_id',$id)->where('stock','>','0')->get();


        $product_sizes = TableProduct::find($id);
        $sizes = json_encode($product_sizes->properties["sizes"]);
        $sizes_decode = json_decode($sizes);

        return view('template.product.detail',compact([
            'rowDetailPhoto',
            'rowDetail',
            'product',
            'sizes_decode',
            'product_properties',
        ]));
    }

}
