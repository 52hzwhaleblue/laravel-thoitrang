<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablePhoto;
use App\Models\TableStatic;
use App\Models\TableProduct;
use App\Models\TableProductList;
use App\Models\TablePost;

class IndexController extends Controller
{
    public function index()
    {
        // slide,gioithieu,pronb,banner_sanpham,splistnb,bannerQC,album,postnb
        $slide = TablePhoto::where('type', 'slideshow')->get();
        $gioithieu = TableStatic::where('type', 'gioi-thieu')->get();
        $banner_sanpham = TablePhoto::where('type', 'banner-sanpham')->get();
        $bannerQC = TablePhoto::where('type', 'banner-quangcao')->get();
        $album = TablePhoto::where('type', 'album')->get();

        $pronb = TableProduct::whereJsonContains('status', 'noibat')->get();
        $splistnb = TableProductList::whereJsonContains('status', 'noibat')->get();
        $postnb = TablePost::whereJsonContains('status', 'noibat')->get();



        return view('template.index.index',compact([
            'slide',
        ]));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
