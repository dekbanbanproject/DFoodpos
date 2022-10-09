<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use DataTables;
use PDF;
use Auth;
use MONTH;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use App\Models\User;
use App\Models\Person;

class PkclaimController extends Controller
{
    // protected $db_mysql;

    // function __construct()
    // {
    //     $this->db_mysql = config('database.connections.mysql.database');
    // }
    public function showperson(){

        // $per = DB::connection('mysql2')->table('person')->select('pname','fname','cid')->limit(50);
        // $start_date = "2022-01-01";
        // $end_date   = "2022-09-01";  
        $start_date   = "2022-09-01"; 
        $end_date   = "2022-09-03"; 
        $date = date("Y-m-d");
        $date_m = date("MONTH(DATE($date))");
        // SELECT * 
        // FROM   table_name 
        // WHERE  date_created > (NOW() - INTERVAL 1 MONTH);
        // dd($date_m);
        $ovstsdd = DB::connection('mysql3')->select('select COUNT(DISTINCT vn) as visit FROM ovst WHERE  vstdate > (NOW() - INTERVAL 1 MONTH);');
//    dd($ovstsdd);
        // $ovsts = DB::connection('mysql3')->table('ovst')->where('pttype','=',$type)->WhereBetween('vstdate',[$date,$date])->count(); 
        // $physic = DB::connection('mysql3')->select('select MONTH(DATE(begin_datetime)) AS month,
        // COUNT(DISTINCT vn) as visit
        // FROM physic_list                        
        // WHERE DATE(begin_datetime) BETWEEN "'.$start_date.'" AND "'.$end_date.'"
        // GROUP BY MONTH(DATE(begin_datetime))
        // ORDER BY YEAR(DATE(begin_datetime)),MONTH(DATE(begin_datetime))');
        // $physic = DB::connection('mysql2')->select('select pname,fname,lname FROM person limit 30');
        // $physic_visit = array_column($physic,'visit'); 

//         SELECT COUNT(hn) AS H FROM ovst
// WHERE pttype = 'A7'
// AND vstdate BETWEEN '2022-09-01' AND '2022-09-03'
// $sss_ch = DB::connection('mysql3')->select('select COUNT(hn) AS Ssch FROM ovst 
//         WHERE pttype = "A7" AND vstdate BETWEEN "'.$start_date.'" AND "'.$end_date.'"');
      
        $newDate = date('Y-m-d', strtotime($date. ' -1 months')); //ย้อนหลัง 1 เดือน
        // dd($newDate);
        $count_a7 = DB::connection('mysql3')->table('ovst')->where('pttype','=','A7')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_co = DB::connection('mysql3')->table('ovst')->where('pttype','=','co')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_CI = DB::connection('mysql3')->table('ovst')->where('pttype','=','CI')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_C4 = DB::connection('mysql3')->table('ovst')->where('pttype','=','C4')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_39 = DB::connection('mysql3')->table('ovst')->where('pttype','=','39')->WhereBetween('vstdate',[$newDate,$date])->count();
        $count_C2 = DB::connection('mysql3')->table('ovst')->where('pttype','=','C2')->WhereBetween('vstdate',[$newDate,$date])->count();
  
        // $count_a7 = DB::connection('mysql3')->select('select COUNT(vn) FROM ovst vstdate DATE_SUB(CURDATE(), INTERVAL 1 MONTH)');
        // $m = MONTH(DATE($date)); $ovsts = DB::connection('mysql3')->select('select COUNT() FROM ovst WHERE pttype ="'.$type.'" AND vstdate BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH)');

        // $data = [];
        // $event = array();       
        // $ovsts = DB::connection('mysql3')->table('ovst')
        // ->leftJoin('pttype','pttype.pttype','=','ovst.pttype')
        // ->WhereBetween('vstdate',[$start_date,$end_date])->get(); 

        // $ovsts = DB::connection('mysql3')->select('select MONTH(DATE(vstdate)) AS month,
        // COUNT(DISTINCT pttype) as type
        // FROM ovst     
        // GROUP BY MONTH(DATE(vstdate))');

        // $ovsts = DB::connection('mysql3')->select('select MONTH(DATE(vstdate)) AS month,
        // COUNT(DISTINCT pttype) as type
        // FROM ovst     
        // GROUP BY MONTH(DATE(vstdate))');

        // dd($physict);
        $type = DB::connection('mysql3')->table('pttype')->get(); 
        // $ovsts = DB::connection('mysql3')->table('ovst')
        // ->WhereBetween('vstdate',[$date,$date])
        // ->Where('vstdate','=',)
        // ->count();  
        // $ovsts = DB::connection('mysql3')->table('ovst')->WhereBetween('vstdate',[$date,$date])->groupBy('pttype')->count();  
        // dd($ovsts);

        // $currentMonth = date('M');// if number, then date('m');
        // dd($currentMonth);
        //Last month
        // $lastMonth = Date('F', strtotime('first day of previous month');
        // $nextMonth = Date('F', strtotime('first day of next month');

        return view('fontend/person', [
            // 'physic'   =>  $physic,
            'count_a7'   =>  $count_a7,
            'count_co'   =>  $count_co,
            'count_CI'   =>  $count_CI,
            'count_C4'   =>  $count_C4,
            'count_39'   =>  $count_39,
            'count_C2'   =>  $count_C2,
            // 'ovsts'      => $ovsts,
            'types'      => $type
        ]);
    }





}
