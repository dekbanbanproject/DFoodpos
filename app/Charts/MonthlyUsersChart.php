<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;


class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    // {
    //     return $this->chart->pieChart()
    //         ->setTitle('Top 3 scorers of the team.')
    //         ->setSubtitle('Season 2021.')
    //         ->addData([40, 50, 30])
    //         ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    // }
    public function build()
    {
        // return $this->chart->donutChart()
        //     ->setTitle('Top 3 scorers of the team.')
        //     ->setSubtitle('Season 2021.')
        //     ->addData([20, 24, 30])
        //     ->setLabels(['Player 7', 'Player 10', 'Player 9']);

        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
