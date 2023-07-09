<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use App\Models\TablePromotion;
use Functions;


class OptionController extends BaseController
{
    public $type;

    public function __construct() {
        $this->type = Functions::getTypeByComAdmin();
    }

     public function index()
    {
        // // Lấy dữ liệu với type
        $type =  $this->type;
        $data = TablePromotion::all();

        return view('admin.template.option.option',compact('data','type'));
    }


    public function create()
    {
        $type =  $this->type;
        $products = TableProduct::all();

        return view('admin.template.option.option_add',compact('type','products'));
    }


    public function store(Request $request)
    {
        $option = new TablePromotion();
        $option->name = $request->get('name');
        $option->desc = $request->get('desc');
        $option->code = $request->get('code');
        $option->order_price_conditions = $request->get('order_price_conditions');
        $option->discount_price = $request->get('discount_price');
        $option->product_id = $request->get('product_id');
        $option->limit = $request->get('limit');
        $option->end_date = $request->get('end_date');
        $option->save();

        $noti = [
            'title'=> 'Có một voucher giảm giá '.$request->get('discount_price'),
            'body' => $request->get('order_price_conditions')
        ];
        $this->pusher('promo-channel','promo-event',$noti);

        return redirect()
            ->route('admin.option.'.$this->type.'.index')
            ->with('message', 'Bạn đã tạo ' .$this->type. ' thành công!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = TablePromotion::find($id);
        $products = TableProduct::all();
        $type =  $this->type;
        return view('admin.template.option.option_edit',compact('data','products','type'));

    }


    public function update(Request $request, $id)
    {
        $type = $this->type;

        $option = TablePromotion::where('id', $id)->first();
        $option->name = $request->get('name');
        $option->desc = $request->get('desc');
        $option->code = $request->get('code');
        $option->order_price_conditions = $request->get('order_price_conditions');
        $option->discount_price = $request->get('discount_price');
        $option->product_id = $request->get('product_id');
        $option->limit = $request->get('limit');
        $option->end_date = $request->get('end_date');
        $option->save();

        return redirect()
            ->route('admin.option.'.$type.'.index')
            ->with('message', 'Bạn đã cập nhật ' .$type. ' thành công!');
    }


    public function destroy(Request $request,$id)
    {
        $promotion = TablePromotion::find($id);
        if($promotion !=null){
            $promotion->delete();
            return redirect()->route('admin.option.ma-giam-gia.index')->with('message', 'Bạn đã xóa mã giảm giá thành công!');
        }
        return ;
    }
}
