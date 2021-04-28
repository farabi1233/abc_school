<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function view()
    {
      
        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.view-shift', $data);
    }


    public function add()
    {
       
        return view('backend.setup.student_shift.add-shift');
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required',
        ]);
        


        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.shift.view')->with('success', 'Shift Added Successfully');
    }


    public function edit($id)
    {
        
        $editData = StudentShift::find($id);

        return view('backend.setup.student_shift.add-shift', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = StudentShift::find($id);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('setups.student.shift.view')->with('success', 'Edit Student Shift Successfully');
    }

    public function delete($id)
    {
        $class = StudentShift::find($id);


        $class->delete();
        return redirect()->route('setups.student.shift.view')->with('success', 'Shift Deleted Successfully');
    }
}
