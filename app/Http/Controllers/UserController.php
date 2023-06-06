<?php

namespace App\Http\Controllers;

use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\TableProduct;
use App\Models\TableProductDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {



    }

    public function show($user_id)
    {

        $resId_order = array();
        $arrId_order = DB::table('table_orders')->select('id')->where('user_id',$user_id)->get();
        foreach ( $arrId_order as $k => $v) {
            $resId_order[] = $v->id;
        }

        $order_details = TableOrderDetail::whereIn('order_id', $resId_order)->get();
        $rowUser  = User::where('id',$user_id)->first();
        $all = TableOrder::where('user_id',$user_id)->get();
        $confirmed = TableOrder::where('user_id',$user_id)->where('status_id',2)->get();
        $onDelivery = TableOrder::where('user_id',$user_id)->where('status_id',3)->get();
        $delivered = TableOrder::where('user_id',$user_id)->where('status_id',4)->get();
        $cancled = TableOrder::where('user_id',$user_id)->where('status_id',5)->get();

//        return $order_details;

        return view('template.user.user',compact(
            'order_details',
            'rowUser',
            'all',
            'confirmed',
            'onDelivery',
            'delivered',
            'cancled',
        ));
    }
}
