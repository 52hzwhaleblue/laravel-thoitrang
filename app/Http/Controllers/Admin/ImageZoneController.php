<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableProductDetail;
use App\Http\Controllers\Api\BaseController as BaseController;


class ImageZoneController extends BaseController
{
    public function show($id){
        return view('admin.template.product.man.detail',compact([
            'id'
        ]));
    }

    public function upload(Request $request,$id){
        $image = $request->file('file');
        $name = $request->file('file')->getClientOriginalName();

        $url1 = $this->uploadRowDetailPhoto($request,"product-details/",524,524);


//        $image->move(public_path('images'),$name);

        $model = new TableProductDetail();
        $model->product_id = $id;
        $model->photo = $url1;
        $model->save();

        return response()->json(['success' => $url1]);
    }
}
