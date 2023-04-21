<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePromotion;
use Functions;


class OptionController extends Controller
{
    public $type;

    public function __construct() {
        $this->type = Functions::getTypeByCom();
    }

     public function index()
    {
        // // Lấy dữ liệu với type
        $type =  $this->type;
        if($type='ma-giam-gia'){
            $data = TablePromotion::all();
        }
        return view('admin.template.option.option',compact('data','type'));
    }


    public function create()
    {

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
