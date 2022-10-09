<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;


use DataTables;


class StaticController extends Controller
{  
 
  public static function count_type($type)
  {   
    $date = date("Y-m-d");
    // $m = date("m");
    $newDate = date('Y-m-d', strtotime($date. ' -1 months')); //ย้อนหลัง 1 เดือน
    // $ovsts = DB::connection('mysql3')->table('ovst')->WhereBetween('vstdate',[$start_date,$end_date])->count();  
    $ovsts = DB::connection('mysql3')->table('ovst')->where('pttype','=',$type)->WhereBetween('vstdate',[$newDate,$date])->count(); 
    return $ovsts;
  }
  

}