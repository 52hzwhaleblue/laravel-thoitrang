<?php

namespace App\Charts;

use App\Models\TableOrder;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Request;

class RevenueThisMonthChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now();

        $arrTotalPrice  = DB::table('table_orders')
            ->select('total_price')
            ->whereBetween('created_at',[$start,$end])
            ->orderBy('created_at', 'ASC')
            ->get();

        $arrOrderDate  = DB::table('table_orders')
            ->select('created_at')
            ->whereBetween('created_at',[$start,$end])
            ->orderBy('created_at', 'ASC')
            ->get();

        $totalPrice = array();
        foreach ( $arrTotalPrice as $v) {
            $totalPrice[] =$v->total_price;
        }

        $orderDate = array();
        foreach ( $arrOrderDate as $v) {
            $orderDate[] =$v->created_at;
        }

        $title = 'Doanh thu tháng '.$start->format('m');
        return $this->chart->areaChart()
            ->setTitle($title)
            ->addData('Tháng này', $totalPrice)
            ->setXAxis($orderDate);
    }
}
