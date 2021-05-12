<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function view()
    {
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view-subject', $data);
    }


    public function add()
    {
       
        return view('backend.setup.subject.add-subject');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:subjects,name',
        ]);
        


        $data = new Subject();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('backend.setups.subject.view')->with('success', 'Subject Added Successfully');
    }



    public function edit($id)
    {
        
        $editData = Subject::find($id);

        return view('backend.setup.subject.add-subject', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = Subject::find($id);
        $data->name = $request->name;
        $this->validate($request, [
            'name' => 'required|unique:subjects,name',
        ]);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('backend.setups.subject.view')->with('success', 'Edit Subject Successfully');
    }

    public function delete($id)
    {
        $class = Subject::find($id);


        $class->delete();
        return redirect()->route('backend.setups.subject.view')->with('success', 'Subject Deleted Successfully');
    }
}
