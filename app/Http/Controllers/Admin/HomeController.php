<?php

namespace App\Http\Controllers\Admin;

use App\Charts\RevenueFilterByDateChart;
use App\Charts\RevenueThisMonthChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\ActiveInactiveUserChart;
use App\Charts\ProductsMostViewed;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class HomeController extends Controller
{
    public $chart;

    protected $redirectTo = '/admin';

    public function __construct() {
        $this->chart =  new LarapexChart();
    }

    public function index(Request $request)
    {
//         Chart active-inactive users
//        $objActiveInactiveUser = new ActiveInactiveUserChart($this->chart);
//        $chartActiveInactiveUser = $objActiveInactiveUser->build();
//
//         Chart Top 10 products most viewed
//        $objProductMostViewed = new ProductsMostViewed($this->chart);
//        $chartProductMostViewed  = $objProductMostViewed->build();

        // Chart revenue this month
        $objRevenueThisMonth = new RevenueThisMonthChart($this->chart);
        $chartRevenueThisMonth  = $objRevenueThisMonth->build();

        // Top 10 products best seller
        $top10ProductBestSeller= DB::table('table_order_details')
            ->selectRaw('product_id,SUM(quantity) AS total_quantity')
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();

        // Top 10 products most viewed
        $top10ProductMostViewed= DB::table('table_products')
            ->select('*')
            ->orderByDesc('view')
            ->limit(3)
            ->get();

        return view('admin.app',compact([
//            'chartActiveInactiveUser',
//            'chartProductMostViewed',
            'top10ProductMostViewed',
            'chartRevenueThisMonth',
            'top10ProductBestSeller',
        ]));
    }



}
