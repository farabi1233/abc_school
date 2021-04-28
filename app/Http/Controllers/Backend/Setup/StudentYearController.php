<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentYear;
use Illuminate\Http\Request;
use Validator;

class StudentYearController extends Controller
{
     public function view()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view-year', $data);
    }


    public function add()
    {
       
        return view('backend.setup.student_year.add-year');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        


        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.year.view')->with('success', 'Year Added Successfully');
    }



    public function edit($id)
    {
        
        $editData = StudentYear::find($id);

        return view('backend.setup.student_year.add-year', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = StudentYear::find($id);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('setups.student.year.view')->with('success', 'Edit Student Year Successfully');
    }

    public function delete($id)
    {
        $class = StudentYear::find($id);


        $class->delete();
        return redirect()->route('setups.student.year.view')->with('success', 'Year Deleted Successfully');
    }
}
