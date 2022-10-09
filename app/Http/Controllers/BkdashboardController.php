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

use App\Charts\ClaimChart;

class BkdashboardController extends Controller
{
    public function bk_dashboard(ClaimChart $chart)
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        return view('backend/bk_dashboard',
        ['chart' => $chart->build()]
    );
    }





    public function showperson()
    {

        $start_date   = "2022-09-01";
        $end_date   = "2022-09-03";
        $date = date("Y-m-d");
        $date_m = date("MONTH(DATE($date))");

        $ovstsdd = DB::connection('mysql3')->select('select COUNT(DISTINCT vn) as visit FROM ovst WHERE  vstdate > (NOW() - INTERVAL 1 MONTH);');

        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน
        // dd($newDate);
        $count_a7 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', 'A7')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคม(รพ.ชัยภูมิ)
        $count_co = DB::connection('mysql3')->table('ovst')->where('pttype', '=', 'co')->WhereBetween('vstdate', [$newDate, $date])->count(); //Covid19
        $count_CI = DB::connection('mysql3')->table('ovst')->where('pttype', '=', 'CI')->WhereBetween('vstdate', [$newDate, $date])->count(); //CI UC Co-vid
        $count_C4 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', 'C4')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคม(ตรวจสุขภาพ)
        $count_39 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '39')->WhereBetween('vstdate', [$newDate, $date])->count(); //พรบ.ข้าราชการ อปท.
        $count_C2 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', 'C2')->WhereBetween('vstdate', [$newDate, $date])->count(); //บัตรทอง(ตรวจสุขภาพ)
        $count_06 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '06')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคม กรณีทุพลภาพ
        $count_13 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '13')->WhereBetween('vstdate', [$newDate, $date])->count(); //ต่างด้าวขึ้นทะเบียน
        $count_14 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '14')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคมฉุกเฉิน รพ.อื่น
        $count_15 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '15')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคม(ชำระเงิน)
        $count_17 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '17')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคมฉุกเฉินน้ำท่วม
        $count_18 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '18')->WhereBetween('vstdate', [$newDate, $date])->count(); //บัตรทองฉุกเฉินน้ำท่วม
        $count_20 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '20')->WhereBetween('vstdate', [$newDate, $date])->count(); //ค/ค ข้าราชการ
        $count_21 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '21')->WhereBetween('vstdate', [$newDate, $date])->count(); //ข้าราชการส่วนท้องถิ่น(ชำระเงิน)
        $count_22 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '22')->WhereBetween('vstdate', [$newDate, $date])->count(); //รัฐวิสาหกิจ
        $count_24 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '24')->WhereBetween('vstdate', [$newDate, $date])->count(); //ครูเอกชน
        $count_25 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '25')->WhereBetween('vstdate', [$newDate, $date])->count(); //ข้าราชการ กทม.
        $count_30 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '30')->WhereBetween('vstdate', [$newDate, $date])->count(); //บัตรทอง(บัตรหมดอายุ ส่งพบประกัน)
        $count_31 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '31')->WhereBetween('vstdate', [$newDate, $date])->count(); //พรบ.คปภ
        $count_32 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '32')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคม(อุบัติเหตุจราจร)
        $count_33 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '33')->WhereBetween('vstdate', [$newDate, $date])->count(); //บัตรทอง(อุบัติเหตุจราจร)
        $count_34 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '34')->WhereBetween('vstdate', [$newDate, $date])->count(); //ประกันสังคมเจ็บป่วยทั่วไป รพ.อื่น
        $count_35 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '35')->WhereBetween('vstdate', [$newDate, $date])->count(); //กองทุนทดแทน
        $count_36 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '36')->WhereBetween('vstdate', [$newDate, $date])->count(); //พรบ.บัตรทอง
        $count_37 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '37')->WhereBetween('vstdate', [$newDate, $date])->count(); //พรบ.ประกันสังคม
        $count_38 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '38')->WhereBetween('vstdate', [$newDate, $date])->count(); //พรบ.ข้าราชการจ่ายตรง
        $count_39 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '39')->WhereBetween('vstdate', [$newDate, $date])->count(); //พรบ.ข้าราชการ อปท.
        $count_40 = DB::connection('mysql3')->table('ovst')->where('pttype', '=', '40')->WhereBetween('vstdate', [$newDate, $date])->count(); //สังคมสงเคราะห์

        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  

        $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();

        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        // $data = [];
        $data = "";
        $dataname = "";
        $dataset = [];
        $label = [];
        $dataCount = [];

        foreach ($type_chart5 as $item) {
            // $data['label'][] = $item->name;
            // $data['data'][] = DB::connection('mysql3')->table('ovst')->where('pttype','=',$item->pttype)->WhereBetween('vstdate',[$newDate,$date])->count(); 
            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count();

            // if ($datacount != 0) {
            //     $dataname .= "['".$item->name."'],";
            //     $data .= "['".$datacount."'],";            
            // }


            $data .= "['" . $item->name . "',  " . $data_count . "],";

            $dataset[] = [
                'label' => $item->name,
                'count' => $data_count
            ];

            $label[] = $item->name;
            $dataCount[] = $data_count;
        }

        $chartData = $data;
        $chartData_name = $dataname;

        $chartData_label = $label;
        //dd($dataset['label']);
        //return  '<pre>'.$dataset.'</pre>';
        // return response()->json($chartData);
        // return $chartData;

        // dd($chartData);
        // $data['data'] = json_encode($chartData);
        // $datacount = json_encode($chartData);
        //  dd($dataCount);
        return view('fontend/person', [
            // 'physic'   =>  $physic,
            'count_a7' => $count_a7, 'count_co' => $count_co, 'count_CI' => $count_CI, 'count_C4' => $count_C4, 'count_39' => $count_39, 'count_C2' => $count_C2,
            'count_06' => $count_06, 'count_13' => $count_13, 'count_14' => $count_14, 'count_15' => $count_15, 'count_17' => $count_17, 'count_18' => $count_18,
            'count_20' => $count_20, 'count_21' => $count_21, 'count_22' => $count_22, 'count_24' => $count_24, 'count_25' => $count_25, 'count_30' => $count_30,
            'count_31' => $count_31, 'count_32' => $count_32, 'count_33' => $count_33, 'count_34' => $count_34, 'count_35' => $count_35, 'count_36' => $count_36,
            'count_37' => $count_37, 'count_38' => $count_38, 'count_40' => $count_40,
            'types'   => $type, 'dataset' => $dataset, 'label' => $label, 'dataCount' => $dataCount, 'chartData_label' => $chartData_label,
            'chartData'    => $chartData, 'chartData_name' => $chartData_name
        ]);
    }


    public function bar()
    {
        // $date = date("Y-m-d");
        // $date_m = date("MONTH(DATE($date))");
        // $ovstsdd = DB::connection('mysql3')->select('select COUNT(DISTINCT vn) as visit FROM ovst WHERE  vstdate > (NOW() - INTERVAL 1 MONTH);');
        // $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน
        // $newweek = date('Y-m-d', strtotime($date . ' -1 week')); //ย้อนหลัง 1 สัปดาห์  
        // dd($newweek);
        // $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();
        // $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();
        // $data = [];
        // $data = "";
        // $dataname = "";
        // $dataset = [];
        // $label = [];
        // $dataCount = [];
        // foreach ($type_chart5 as $item) {
        //     $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count();  //ย้อนหลัง 1 เดือน
        //     $data_count_week = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newweek, $date])->count();  //ย้อนหลัง 1 สัปดาห์
        //     $data .= "['" . $item->name . "',  " . $data_count . "],";
        //     $dataset[] = [
        //         'label' => $item->name,
        //         'count' => $data_count
        //     ];
        //     $label[] = $item->name;
        //     $dataCount[] = $data_count;
        //     $dataset_2[] = [
        //         'label_week' => $item->name,
        //         'count_week' => $data_count_week
        //     ];
        // }
        // $chartData = $data;
        // $chartData_name = $dataname;

        // $opd_counts = DB::connection('mysql2')->select('SELECT count(DISTINCT hn) AS hn FROM ovst 
        // WHERE	vstdate > (NOW() - INTERVAL 1 MONTH) 
        // AND vn IN (select vn from er_regist 
        // where vstdate > (NOW() - INTERVAL 1 MONTH));');

        // $chartData_label = $label;
        // return view('fontend/bar', [ 
        //     'types'   => $type, 'dataset' => $dataset, 'label' => $label, 'dataCount' => $dataCount, 'chartData_label' => $chartData_label,
        //     'chartData'    => $chartData, 'chartData_name' => $chartData_name
        // ]);
        return view('fontend/bar');
    }

    public function doughnut()
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        return view('fontend/doughnut');
    }

    public function line()
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        return view('fontend/line');
    }
    public function bubble()
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        return view('fontend/bubble');
    }
    public function polarArea()
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type = DB::connection('mysql3')->table('pttype')->select('pttype', 'name')->get();
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        return view('fontend/polarArea');
    }

    public function bk_getbar(Request $request)
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $newweek = date('Y-m-d', strtotime($date . ' -1 week')); //ย้อนหลัง 1 สัปดาห์  

        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();

        $label = [];
        $dataCount = [];

        foreach ($type_chart5 as $item) {

            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count(); //ย้อนหลัง 1 เดือน  
            $data_count_week = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newweek, $date])->count();  //ย้อนหลัง 1 สัปดาห์

            if ($data_count > 0) {
                $dataset[] = [
                    'label' => $item->name,
                    'count' => $data_count
                ];
            }

            if ($data_count_week > 0) {
                $dataset_2[] = [
                    'label_week' => $item->name,
                    'count_week' => $data_count_week
                ];
            }
        }

        // $chartData_label = $label;
        // $chartData_Count = $dataCount; 
        $chartData_dataset = $dataset;
        $chartData_dataset_week = $dataset_2;
        // dd($chartData_dataset);
        return response()->json([
            'status'             => '200', 
            'chartData_dataset_week'    => $chartData_dataset_week,
            'chartData_dataset'  => $chartData_dataset
        ]);
    }

    public function bk_getline(Request $request)
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $newweek = date('Y-m-d', strtotime($date . ' -1 week')); //ย้อนหลัง 1 สัปดาห์  

        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();
        $label = [];
        $dataCount = [];

        foreach ($type_chart5 as $item) {
            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count();
            $data_count_week = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newweek, $date])->count();  //ย้อนหลัง 1 สัปดาห์
           
            if ($data_count > 0) {
                $dataset[] = [
                    'label' => $item->name,
                    'count' => $data_count
                ];
            }
            if ($data_count_week > 0) {
                $dataset_2[] = [
                    'label_week' => $item->name,
                    'count_week' => $data_count_week
                ];
            }
        }

        $chartData_dataset = $dataset;
        $chartData_dataset_week = $dataset_2;
        return response()->json([
            'status'             => '200',
            'chartData_dataset_week'    => $chartData_dataset_week,
            'chartData_dataset'  => $chartData_dataset
        ]);
    }


    public function getbubble(Request $request)
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();
        $label = [];
        $dataCount = [];

        foreach ($type_chart5 as $item) {
            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count();

            if ($data_count > 0) {
                $dataset[] = [
                    'label' => $item->name,
                    'count' => $data_count
                ];
            }
        }

        $chartData_dataset = $dataset;
        // dd($chartData_dataset);
        return response()->json([
            'status'             => '200',
            'chartData_dataset'  => $chartData_dataset
        ]);
    }

    public function getpolarArea(Request $request)
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();
        $label = [];
        $dataCount = [];

        foreach ($type_chart5 as $item) {
            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count();

            if ($data_count > 0) {
                $dataset[] = [
                    'label' => $item->name,
                    'count' => $data_count
                ];
            }
        }

        $chartData_dataset = $dataset;
        // dd($chartData_dataset);
        return response()->json([
            'status'             => '200',
            'chartData_dataset'  => $chartData_dataset
        ]);
    }

    public function getdoughnut(Request $request)
    {
        $date = date("Y-m-d");
        $newDate = date('Y-m-d', strtotime($date . ' -1 months')); //ย้อนหลัง 1 เดือน  
        $type_chart5 = DB::connection('mysql3')->table('pttype')->select('pttype', 'name', 'pcode')->get();
        $label = [];
        $dataCount = [];

        foreach ($type_chart5 as $item) {
            $data_count = DB::connection('mysql3')->table('ovst')->where('pttype', '=', $item->pttype)->WhereBetween('vstdate', [$newDate, $date])->count();

            if ($data_count > 0) {
                $dataset[] = [
                    'label' => $item->name,
                    'count' => $data_count
                ];
            }
        }

        $chartData_dataset = $dataset;
        // dd($chartData_dataset);
        return response()->json([
            'status'             => '200',
            'chartData_dataset'  => $chartData_dataset
        ]);
    }
}
