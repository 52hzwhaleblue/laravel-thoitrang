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
        echo  $data = json_encode($chart_data);
    }
}
