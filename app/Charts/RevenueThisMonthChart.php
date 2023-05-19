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
//        dd($resArray);

        $title = 'Doanh thu tháng '.$start->format('m');
        return $this->chart->areaChart()
            ->setTitle($title)
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Tháng này', [
                $resArray[0]['total_price'],
                $resArray[1]['total_price'],
                $resArray[2]['total_price'],
                $resArray[3]['total_price'],
                $resArray[4]['total_price'],
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
