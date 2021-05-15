<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function view()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view-designation', $data);
    }


    public function add()
    {
       
        return view('backend.setup.designation.add-designation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name',
        ]);
        


        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.designation.view')->with('success', 'Year Added Successfully');
    }



    public function edit($id)
    {
        
        $editData = Designation::find($id);

        return view('backend.setup.designation.add-designation', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = Designation::find($id);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('setups.designation.view')->with('success', 'Edit Designaion Successfully');
    }

    public function delete($id)
    {
        $designation = Designation::find($id);


        $designation->delete();
        return redirect()->route('setups.designation.view')->with('success', 'Designation Deleted Successfully');
    }
}
