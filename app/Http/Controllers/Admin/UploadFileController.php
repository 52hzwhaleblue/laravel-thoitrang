<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index(){
        return view();
    }
    public function uploadImages(Request $request){
        $data = array();

        $validator = Validator::make($request->all(),[
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()){
            $data['success'] =0;
            $data['error'] = $validator->errors()->first('file');
        }
        else{
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();


            #File upload location
            $location = 'backend/assets/img/products';

            # Uplaod Files
            $file->move($location, $filename);

            # Response
            $data['success'] =1;
            $data['message'] = 'Photo uploaded successfully ';

        }
        return response()->json($data);

        $ProductDetails = new ProductDetails;

        $ProductDetails->id_prod = 5;
        $ProductDetails->photo = $filename;
        $ProductDetails->save();
    }
}
