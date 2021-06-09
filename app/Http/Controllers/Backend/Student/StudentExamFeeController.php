<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\FeeCategoryAmmount;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\User;
use PDF;

class StudentExamFeeController extends Controller
{
    public function view()
    {
        $years = StudentYear::orderBy('id','desc')->get();
        $classes = StudentClass::all();
        // echo "<pre>"; print_r($allData); die;
        return view('backend.student.monthly_fee.view',compact('years','classes'));
    }
    public function getStudent(Request $request)
    {
        
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        dd($year_id);
        if($year_id != '')
        {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if($class_id != '')
        {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount','student'])->where($where)->get();
        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (this student)</th>';
        $html['thsource'] .= '<th>Action</th>';
        foreach ( $allStudent as $key => $v){
            $registrationFee = FeeCategoryAmmount::where(['fee_category_id'=>'2','class_id'=>$v->class_id])->first();
            $color = 'success';
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationFee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalFee = $registrationFee->amount;
            $discount = $v['discount']['discount'];
            $discountTableFee = $discount/100*$originalFee;
            $finalFee = (int)$originalFee-(int)$discountTableFee;
  
            $html[$key]['tdsource'] .= '<td>'.$finalFee.'TK'.'</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blank" href="'.route("students.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
  
      }
      return response()->json(@$html);
    }
    public function paySlip(Request $request)
    {
       
        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $allStudent['details'] = AssignStudent::with(['discount','student'])->where(['student_id'=>$student_id,'class_id'=>$class_id])->first();
        // $allStudent['report'] = ReportHeading::where('status','1')->first();
        $pdf = PDF::loadView('backend.student.reg_fee.fee_slip',$allStudent);
        return $pdf->stream('reg-fee-payslip-'.$allStudent['details']['student']['id_no'].'.pdf');

        
    }
}
