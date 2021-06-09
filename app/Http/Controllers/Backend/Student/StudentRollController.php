<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentRollController extends Controller
{
    public function view()
    {

        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::orderBy('id', 'asc')->get();


        return view('backend.student.roll_generate.view', $data);
    }
    public function getStudent(Request $request)
    {
        $allData = AssignStudent::with('student')->where(['year_id'=>$request->year_id,'class_id'=>$request->class_id])->get()->toArray();
    //    dd($allData);
        return response()->json($allData);
    }
    public function store(Request $request)
    {
        
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($request->student_id != null)
        {
            for($i=0;  $i< count($request->student_id); $i++)
            {
                AssignStudent::with(['student'])->where(['year_id'=>$year_id,'class_id'=>$class_id,'student_id'=>$request->student_id[$i]])
                                ->update(['roll'=>$request->roll[$i]]);
            }
        }else{
           
            return redirect()->back()->with('error','Sorry! Student List is empty');
        }
       
        return redirect()->route('students.roll.view')->with('success','Successfully role generated');
    }
}
