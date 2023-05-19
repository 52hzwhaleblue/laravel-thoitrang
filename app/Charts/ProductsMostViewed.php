<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ProductsMostViewed
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        // Top 10 products most viewed
        $top10ProductMostViewed= DB::table('table_products')
            ->select('*')
            ->orderByDesc('view')
            ->limit(3)
            ->get();

        $resArray =$top10ProductMostViewed->toArray();
//        dd($resArray);

        return $this->chart->pieChart()
            ->setTitle('Top 3 sản phẩm nhiều lượt xem nhất.')
            ->setDataset([
                $resArray[0]->view,
                $resArray[1]->view,
                $resArray[2]->view,
            ])
            ->setLabels([
                $resArray[0]->name,
                $resArray[1]->name,
                $resArray[2]->name,
            ]);
    }
}
