<?php

namespace App\Charts;

use App\Models\TableOrder;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
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

        $sql = TableOrder::whereBetween('created_at',[$start,$end])->orderBy('created_at', 'ASC')->get();

        $resArray = $sql->toArray();

        $totalPrice = array();
        foreach ($resArray as $v) {
            array_push($totalPrice,$v['total_price']) ;
       }

        $prices = json_encode($totalPrice,true);

        $title = 'Doanh thu tháng '.$start->format('m');
        return $this->chart->areaChart()
            ->setTitle($title)
            ->addData('Tháng này', [
                $resArray[0]['total_price'].'vnđ',
                $resArray[1]['total_price'].'vnđ',
                $resArray[2]['total_price'].'vnđ',
                $resArray[3]['total_price'].'vnđ',
                $resArray[4]['total_price'].'vnđ',
            ])
            ->setXAxis([
                $resArray[0]['created_at'],
                $resArray[1]['created_at'],
                $resArray[2]['created_at'],
                $resArray[3]['created_at'],
                $resArray[4]['created_at'],
            ]);
    }
}
