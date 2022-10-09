<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use App\Charts\ClaimChart;

class DashboardController extends Controller
{ 
    public function index(ClaimChart $chart)
    {
        return view('chart.index', ['chart' => $chart->build()]);
    } 

   
}
