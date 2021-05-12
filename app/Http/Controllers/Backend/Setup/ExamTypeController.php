<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function view()
    {
        
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view-exam-type', $data);
    }


    public function add()
    {
       
        return view('backend.setup.exam_type.add-exam-type');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        


        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.exam.type.view')->with('success', 'Exam Type Added Successfully');
    }



    public function edit($id)
    {
        
        $editData = ExamType::find($id);

        return view('backend.setup.exam_type.add-exam-type', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = ExamType::find($id);
        
        $data->name = $request->name;
       $this->validate($request,[
            'name' => 'required|unique:exam_types,name',
        ]);
        

        $data->save();
        return redirect()->route('setups.exam.type.view')->with('success', 'Edit Exam Type Successfully');
    }

    public function delete($id)
    {
        $class = ExamType::find($id);


        $class->delete();
        return redirect()->route('setups.exam.type.view')->with('success', 'Exam Type Deleted Successfully');
    }
}
