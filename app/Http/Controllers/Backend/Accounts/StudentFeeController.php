<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use App\Model\AccountStudentFee;
use App\Model\AssignStudent;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmmount;
use App\Model\StudentClass;
use App\Model\StudentYear;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function view()
    {
        
        $data['allData'] = AccountStudentFee::all();
        return view('backend.accounts.student_fee.view_student_fee',$data);
    }
    public function add()
    {
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.accounts.student_fee.add_student_fee',$data);
    }
    public function getStudent(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));
        $data = AssignStudent::with('discount')->where(['year_id'=>$year_id,'class_id'=>$class_id])->get();
        $html['thsource'] = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee </th>';
        $html['thsource'] .= '<th>Discounted Amount </th>';
        $html['thsource'] .= '<th>Fee (This Student) </th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($data as $key => $std) {
            $student_fee = FeeCategoryAmmount::where(['fee_category_id'=>$fee_category_id,'class_id'=>$std->class_id])->first();
            $accountstudentfees = AccountStudentFee::where([
                                                        'student_id'=>$std->student_id,
                                                        'year_id'=>$std->year_id,
                                                        'class_id'=>$std->class_id,
                                                        'fee_category_id'=>$fee_category_id,
                                                        'date'=>$date,
                                                        ])->first();
            if($accountstudentfees != null){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource'] = '<td>'.$std['student']['id_no'].'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['student']['name'].'<input type="hidden" name="year_id" value="'.$year_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['student']['father_name'].'<input type="hidden" name="class_id" value="'.$class_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$student_fee['amount'].'Tk'.'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';
            $originalfee = $student_fee['amount'];
            $discount = $std['discount']['discount'];
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (int)$originalfee-(int)$discountablefee;
            $html[$key]['tdsource'] .= '<td>'.'<input type="text" name="amount[]" value="'.$finalfee.'" class="form-control" readonly>'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type ="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style ="transform:scale(1.5);margin-left:10px;">'.'</td>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }
    public function store(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        AccountStudentFee::where(['year_id'=>$request->year_id,'class_id'=>$request->class_id,'fee_category_id'=>$request->fee_category_id,'date'=>$date])->delete();
        $checkdata = $request->checkmanage;
        if($checkdata != null){
            for ($i=0; $i < count($checkdata); $i++) { 
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->fee_category_id = $request->fee_category_id;
                $data->date = $request->date;
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }else{
            toastr()->error('Data Updated Failed','Failed');
            return redirect()->back();
        }
            toastr()->success('Data Updated Successfully','Success');
            return redirect()->route('accounts.fee.view');
    }
}
