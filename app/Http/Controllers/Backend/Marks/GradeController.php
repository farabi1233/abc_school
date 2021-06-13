<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Model\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function view()
    {
        $data['allData'] = MarksGrade::all();
        return view('backend.marks.grade_point.view_grade_point',$data);
    }
    public function add()
    {
        return view('backend.marks.grade_point.add_grade_point');
    }
    public function store(Request $request)
    {
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();
        
        return redirect()->route('marks.grade.view')->with('success','Grade Point inserted Successfully');
    }
    public function edit($id)
    {
        $data['editData'] = MarksGrade::find($id);
        return view('backend.marks.grade_point.add_grade_point',$data);
    }
    public function update(Request $request,$id)
    {
        $grade_point = MarksGrade::find($id);
        $grade_point->grade_name = $request->grade_name;
        $grade_point->grade_point = $request->grade_point;
        $grade_point->start_marks = $request->start_marks;
        $grade_point->end_marks = $request->end_marks;
        $grade_point->start_point = $request->start_point;
        $grade_point->end_point = $request->end_point;
        $grade_point->remarks = $request->remarks;
        $grade_point->save();
    
        return redirect()->route('marks.grade.view')->with('success','Grade Point updated Successfully');
    }
    public function delete($id)
    {
        $class = MarksGrade::find($id);


        $class->delete();
        return redirect()->route('marks.grade.view')->with('success', 'Grade Deleted Successfully');
    }

}
