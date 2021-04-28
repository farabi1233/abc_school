<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function view()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view-group', $data);
    }


    public function add()
    {

        return view('backend.setup.student_group.add-group');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        


        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.group.view')->with('success', 'Group Added Successfully');
    }


    public function edit($id)
    {
        
        $editData = StudentGroup::find($id);

        return view('backend.setup.student_group.add-group', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = StudentGroup::find($id);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('setups.student.group.view')->with('success', 'Edit Student Group Successfully');
    }

    public function delete($id)
    {
        $class = StudentGroup::find($id);


        $class->delete();
        return redirect()->route('setups.student.group.view')->with('success', 'Group Deleted Successfully');
    }
}
