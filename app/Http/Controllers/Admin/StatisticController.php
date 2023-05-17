<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function filter_by_date(Request $request)
    {
        $carbon = Carbon::now('Asia/Ho_Chi_Minh');

        $tungay = $request->get('tungay');
        $denngay = $request->get('denngay');

        $sql = TableOrder::whereBetween('created_at',[$tungay,$denngay])->orderBy('created_at', 'ASC')->get();

        $chart_data[] = array();
        foreach ($sql as $key => $v) {

            $chart_data[] = array(
                'total' => $v->total_price,
                'order_date' => $carbon->format($v->created_at),
            );
        }
        echo  $data = json_encode($chart_data,true);
    }

    public function dashboard_filter(Request $request){
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay')
        {
            $get = TableOrder::whereBetween('created_at',[$sub7days,$now])->orderBy('created_at', 'ASC')->get();
        }
        else if ($data['dashboard_value'] == 'thangtruoc')
        {
            $get = TableOrder::whereBetween('created_at',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('created_at',
                'ASC')->get();
        }
        else if ($data['dashboard_value'] == 'thangnay')
        {
            $get = TableOrder::whereBetween('created_at',[$dauthangnay,$now])->orderBy('created_at',
                'ASC')->get();
        }
        else{
            $get = TableOrder::whereBetween('created_at',[$sub365days,$now])->orderBy('created_at',
                'ASC')->get();
        }
        foreach ($get as $key => $v) {
            $chart_data[] = array(
                'total' => $v->total_price,
                'order_date' => $v->created_at,
            );
        }

        echo $data = json_encode($chart_data);
    }

}
