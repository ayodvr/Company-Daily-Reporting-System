<?php

namespace App\Charts;

use DB;
use App\Models\Retail;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlySalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $visitors = Retail::select(
            DB::raw("(sum(amount)) as total_amount"),
            DB::raw("(monthname(created_at)) as month_name")
            )
            ->whereYear('created_at',date('Y'))
            ->groupBy('month_name')
            ->get();
        //dd($visitors);
        $total_amt_arr = [];
        $month_arr = [];

        if(isset($visitors)){
            foreach($visitors as $key => $value){
                array_push($total_amt_arr, $value->total_amount);
                array_push($month_arr, $value->month_name);
            }
        }
        return $this->chart->areaChart()
        // ->setTitle('Monthly Sales Chart')
        // ->setSubtitle('Monthly Sales')
        ->addData('Sales',$total_amt_arr)
        // ->addData('Online sales', [200000, 300000])
        ->setXAxis($month_arr)
        ->setGrid(false, '#3F51B5', 0.1)
        ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
