<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentClassController extends Controller
{
    public function view()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view-class', $data);
    }


    public function add()
    {

        return view('backend.setup.student_class.add-class');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        


        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        toastr()->success('Class Added  ', 'Added Successfully');
        return redirect()->route('setups.student.class.view');
    }


    public function edit($id)
    {
        
        $editData = StudentClass::find($id);

        return view('backend.setup.student_class.add-class', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = StudentClass::find($id);
        $data->name = $request->name;
        

        $data->save();
        toastr()->success('Class Updated', 'Update Successfully');
        return redirect()->route('setups.student.class.view');
    }

    public function delete($id)
    {
        $class = StudentClass::find($id);


        $class->delete();
        toastr()->error('Class Delete', 'Delete Successfully');
        return redirect()->route('setups.student.class.view');
    }
}
