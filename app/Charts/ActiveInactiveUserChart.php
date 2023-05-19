<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ActiveInactiveUserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        return $this->chart->pieChart()
            ->setTitle('Active / Inactive User')
            ->addData([
                \App\Models\User::where('id', '<=', 10)->count(),
                \App\Models\User::where('id', '>', 10)->count(),
            ])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setLabels(['Active users', 'Inactive users']);
    }
}
