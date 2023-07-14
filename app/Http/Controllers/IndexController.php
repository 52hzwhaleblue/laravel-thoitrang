<?php

namespace App\Http\Controllers;

use App\Events\PusherEvent;
use App\Models\TableNotification;
use App\Models\TableProductDetail;
use App\Models\TablePromotion;
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
        $gioithieu = TableStatic::where('type', 'gioi-thieu')->first();
        $gioithieu_slide = TablePhoto::where('type', 'gioithieu-slide')->get();
        $quangcao = TablePhoto::where('type', 'quang-cao')->get();
        $bannerQC = TablePhoto::where('type', 'banner-quangcao')->first();
        $album = TablePhoto::where('type', 'thu-vien-anh')->get();

        $pronb = TableProduct::where('status', 1)->get();
        $splistnb = TableCategory::where('status', 1)->get();
        $dichvu = TablePost::where('type', 'dich-vu')->get();
        $tieuchi = TablePost::where('type', 'tieu-chi')->get();
        $tintuc = TablePost::where('type', 'tin-tuc')->get();
        $promotion = TablePromotion::all();

        $thuoctinh= \App\Models\TableProductDetail::where('product_id', 32)->where('stock','>','0')->get();
        $sizes = array();
        $colors = array();

        foreach ($thuoctinh as $v) {
            $sizes[] = $v->size;
            $colors[] = $v->color;
        }

        $sizeaa = DB::table('table_product_details')->select('size')->where('product_id',32)->get();
        $size_arr = array();
        foreach ($sizeaa as $item) {
            $size_arr[] = $item->size;
        }
//        dd(explode(' ',implode(' ',$size_arr)));

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
            'promotion'
        ]));
    }

    public function load_ajax_product(Request $request)
    {
        $id_category =  (int)$request->get('id_category');
        $data = DB::table('table_products')
        ->where('category_id', $id_category)->orderByDesc('created_at')
        ->get();
        return view('api.product',compact(['data']));
    }

    public function load_ajax_search(Request $request)
    {
        $key =  $request->get('key');
        $data = DB::table('table_products')
            ->where('name','LIKE','%'.$key.'%' )
            ->get();
        return view('api.search',compact(['data']));
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

    public function danh_muc()
    {
        $category = DB::table('table_categories')->paginate(10);
        return view('template.category.category',compact([
            'category',
        ]));
    }
    public function chi_tiet_danh_muc (Request $request,$slug,$id)
    {
        $category_name = TableCategory::find($id);
        $data = DB::table('table_products')
            ->where('category_id', $id)
            ->orderByDesc('created_at')
            ->paginate(20);


        return view('template.category.detail',compact([
            'category_name',
            'data',
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


        ($product_sizes->properties != null)
            ? $sizes = json_encode($product_sizes->properties["sizes"])
            : $sizes = null;

        $sizes_decode = json_decode($sizes);

        // gọi hàm cập nhật view sản phẩm
        $this->update_viewed($request,$slug,$id);

        return view('template.product.detail',compact([
            'rowDetailPhoto',
            'rowDetail',
            'product',
            'sizes_decode',
            'product_properties',
        ]));
    }

    public function update_viewed(Request $request,$slug,$id)
    {
        // cập nhật lại view với id
        // lấy số view hiện tại + 1
        $current_view = DB::table('table_products')
            ->select('view')
            ->where('id',$id)
            ->first();
        $now_view = $current_view->view+1;

        // update table_products
        $table_products = TableProduct::where('id',$id)->first();
        $table_products->view = $now_view;
        $table_products->save();

    }

}
