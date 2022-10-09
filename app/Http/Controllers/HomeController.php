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
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = User::all();
        return view('backend/home',[
            'employee'    =>    $employee
        ]);
    }
    public function createPDF() {
            // retreive all records from db
            $data = User::all();
            // share data to view
            // view()->share('employee',$data);
            $pdf = PDF::loadView('backend/pdf_view', [
                'data'  =>  $data
            ]);
            // download PDF file with download method
            // return $pdf->download('pdf_file.pdf');
            return @$pdf->stream();
      }

      public function createFPDI(Request $request)
      {        
          define('FPDF_FONTPATH', 'font/');
          require(base_path('public') . "/fpdf/WriteHTML.php");
  
          $pdf = new Fpdi(); // Instantiation   start-up Fpdi
  
          function dayThai($strDate)
          {
              $strDay = date("j", strtotime($strDate));
              return $strDay;
          }
          function monthThai($strDate)
          {
              $strMonth = date("n", strtotime($strDate));
              $strMonthCut = array("", "มกราคม", "กุมภาพันธ์ ", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
              $strMonthThai = $strMonthCut[$strMonth];
              return $strMonthThai;
          }
          function yearThai($strDate)
          {
              $strYear = date("Y", strtotime($strDate)) + 543;
              return $strYear;
          }
          function time($strtime)
          {
              $H = substr($strtime, 0, 5);
              return $H;
          }
        
          $datnow =  date("Y-m-j");
  
          $pdf->SetLeftMargin(22);
          $pdf->SetRightMargin(5);
          $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
          $pdf->AddFont('THSarabunNew Bold', '', 'THSarabunNew Bold.php');
          $pdf->SetFont('THSarabunNew Bold', '', 19);
          // $pdf->AddPage("L", ['100', '100']);
          $pdf->AddPage("P");
          $pdf->Text(70, 25, iconv('UTF-8', 'TIS-620', 'แบบฟอร์มขออนุญาตใช้รถส่วนกลาง '));
          $pdf->SetFont('THSarabunNew', '', 15);
          $pdf->Text(130, 35, iconv('UTF-8', 'TIS-620', 'วันที่  ' . dayThai($datnow) . '  เดือน' . monthThai($datnow) . '  พ.ศ. ' . yearThai($datnow)));
          $pdf->SetFont('THSarabunNew Bold', '', 15);
       
          $pdf->Output();
  
          exit;
      }
}
