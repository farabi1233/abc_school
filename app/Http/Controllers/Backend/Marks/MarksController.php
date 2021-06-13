<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Model\ExamType;
use App\Model\StudentClass;
use App\Model\StudentMarks;
use App\Model\StudentYear;
use Illuminate\Http\Request;
use App\User;
class MarksController extends Controller
{
    public function add()
    {
       
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        // echo "<pre>"; print_r($data); die;
        return view('backend.marks.marks_entry.add_marks',$data);
    }
    public function store(Request $request)
    {
        
        $student_count = $request->student_id;
        if($student_count){
            for($i = 0 ; $i< count($request->student_id); $i++){
                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();
            }
        }else{
          
            return redirect()->back()->with('error','Not available student to entry marks');
        }
        
        return redirect()->back()->with('success','Marks inserted Successfully');
    }
    public function edit()
    {
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        // echo "<pre>"; print_r($data); die;
        return view('backend.marks.marks_entry.edit_marks',$data);
    }
    public function getMarks(Request $request)
    {
        
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;
        $getStudent = StudentMarks::with('student')->where(['year_id'=>$year_id,'class_id'=>$class_id,'assign_subject_id'=>$assign_subject_id,'exam_type_id'=>$exam_type_id])->get();
        return response()->json($getStudent);
    }
    public function update(Request $request)
    {
        
        StudentMarks::where(['year_id'=>$request->year_id,'class_id'=>$request->class_id,'assign_subject_id'=>$request->assign_subject_id,'exam_type_id'=>$request->exam_type_id])->delete();
        $student_count = $request->student_id;
        if($student_count){
            for($i = 0 ; $i< count($request->student_id); $i++){
                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();
            }
        }else{
            return redirect()->back()->with('error','No available student ');
        }
        return redirect()->back()->with('success','Update Successfully');
    }
}
