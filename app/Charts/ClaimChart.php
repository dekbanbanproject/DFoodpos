<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
class ClaimChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\lineChart
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $newweek = date('Y-m-d', strtotime($date . ' -1 week')); //ย้อนหลัง 1 สัปดาห์  

        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get(); 
 
        $count_a7 = DB::connection('mysql3')->table('ovst')->where('pttype','=','A7')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_co = DB::connection('mysql3')->table('ovst')->where('pttype','=','co')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_CI = DB::connection('mysql3')->table('ovst')->where('pttype','=','CI')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_C4 = DB::connection('mysql3')->table('ovst')->where('pttype','=','C4')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_39 = DB::connection('mysql3')->table('ovst')->where('pttype','=','39')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_C2 = DB::connection('mysql3')->table('ovst')->where('pttype','=','C2')->WhereBetween('vstdate',[$newDate,$date])->count();

        $label = [];
        $dataCount = [];
        $data = "";

        foreach ($type_chart5 as $item) {

            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count(); //ย้อนหลัง 1 เดือน  
            $data_count_week = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newweek, $date])->count();  //ย้อนหลัง 1 สัปดาห์
            $data .= "['" . $data_count . "'],";
            if ($data_count > 0) {
                // $dataset[] = [
                    // 'label' => $item->name,
                //     'count_mount' => $data_count
                // ];
                $dataset0[] = $item->name;
                $dataset1[] = $data_count;
            }

            if ($data_count_week > 0) {
                // $dataset_2[] = [
                //     // 'label_week' => $item->name,
                //      $data_count_week
                // ];
                $dataset_2[] = $data_count_week;
                $dataset_3[] = $item->name;
            }
        }
        $chartData = $data;
        // $chartData_label = $label;
        // $chartData_Count = $dataCount; 
        // $chartData_dataset = $dataset;
        // $chartData_dataset_week = $dataset_2;

        // dd($dataset_2);
        // return $this->chart->areaChart()
        //     ->setTitle('Sales during 2021.')
        //     ->setSubtitle('Physical sales vs Digital sales.')
        //     ->addData('Physical sales', $dataset1)
        //     // ->addData('Digital sales', $dataset)
        //     ->setXAxis($dataset0);

        // Donut
        // return $this->chart->donutChart()
        //     ->setTitle('Top 3 scorers of the team.')
        //     ->setSubtitle('Season 2021.')
        //     ->addData([20, 24, 30])
        //     ->setLabels(['Player 7', 'Player 10', 'Player 9']);

        // Radial bar
        // return $this->chart->radialChart()
        //     ->setTitle('Passing effectiveness.')
        //     ->setSubtitle('Barcelona city vs Madrid sports.')
        //     ->addData([75, 60])
        //     ->setLabels(['Barcelona city', 'Madrid sports'])
        //     ->setColors(['#D32F2F', '#03A9F4']);

        // Polar area
        // return $this->chart->polarAreaChart()
        //     ->setTitle('Top 3 scorers of the team.')
        //     ->setSubtitle('Season 2021.')
        //     ->addData([20, 24, 30])
        //     ->setLabels(['Player 7', 'Player 10', 'Player 9']);

        // Line
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', $dataset1)
            // ->addData('Digital sales', $dataset_2)
            ->setXAxis($dataset0);

        // Area
        // return $this->chart->areaChart()
        //     ->setTitle('Sales during 2021.')
        //     ->setSubtitle('Physical sales vs Digital sales.')
        //     ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
        //     ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
        //     ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        // Bar
        // return $this->chart->barChart()
        //     ->setTitle('San Francisco vs Boston.')
        //     ->setSubtitle('Wins during season 2021.')
        //     ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        //     ->addData('Boston', [7, 3, 8, 2, 6, 4])
        //     ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        // Horizontal Bar
        // return $this->chart->horizontalBarChart()
        //     ->setTitle('Los Angeles vs Miami.')
        //     ->setSubtitle('Wins during season 2021.')
        //     ->setColors(['#FFC107', '#D32F2F'])
        //     ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        //     ->addData('Boston', [7, 3, 8, 2, 6, 4])
        //     ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        // Heatmap
        // return $this->chart->heatMapChart()
        //     ->setTitle('Basic radar chart')
        //     ->addData('Sales', [80, 50, 30, 40, 100, 20])
        //     ->addHeat('Income', [70, 10, 80, 20, 60, 40])
        //     ->setMarkers(['#FFA41B', '#4F46E5'], 7, 10)
        //     ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        // Radar chart
        // return $this->chart->radarChart()
        //     ->setTitle('Individual Player Stats.')
        //     ->setSubtitle('Season 2021.')
        //     ->addData('Stats', [70, 93, 78, 97, 50, 90])
        //     ->setXAxis(['Pass', 'Dribble', 'Shot', 'Stamina', 'Long shots', 'Tactical'])
        //     ->setMarkers(['#303F9F'], 7, 10);
    }
}
