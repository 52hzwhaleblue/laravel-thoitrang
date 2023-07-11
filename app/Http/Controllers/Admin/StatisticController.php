<?php

namespace App\Http\Controllers\Admin;

use App\Charts\RevenueFilterByDateChart;
use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public $chart;

    public function __construct() {
        $this->chart =  new LarapexChart();
    }


    public function filter_by_date(Request $request)
    {
        $carbon = Carbon::now('Asia/Ho_Chi_Minh');

        $tungay = $request->get('tungay');
        $denngay = $request->get('denngay');

        $sql1 = DB::table('table_orders')
            ->select('total_price','created_at')
            ->whereBetween('created_at',[$tungay,$denngay])
            ->orderBy('created_at', 'ASC')
            ->get();

        $sql = DB::table('table_orders')
            ->selectRaw('payment_method, Date (created_at) as created_at, SUM(total_price) as total_price')
            ->whereBetween('created_at',[$tungay,$denngay])
            ->groupBy (DB::raw ('Date (created_at) ,payment_method'))
            ->get();

        $total_price = array();
        foreach ($sql as $k => $v) {
            $total_price[] = $v->total_price;
        }

        $date = array();
        foreach ($sql as $k => $v) {
            $date[] = $v->created_at;
        }

        $data = [
            'total_price'=>$total_price,
            'date'=>  $date,
            'tungay'=>  $tungay,
            'denngay'=>  $denngay,

        ];
        echo json_encode($data,true);
//        echo  $data = json_encode($total_price,true);
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
