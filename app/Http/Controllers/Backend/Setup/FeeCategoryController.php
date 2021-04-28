<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function view()
    {
        
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view-fee-category', $data);
    }


    public function add()
    {

        return view('backend.setup.fee_category.add-fee-category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        


        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.fee.category.view')->with('success', 'Group Added Successfully');
    }


    public function edit($id)
    {
        
        $editData = FeeCategory::find($id);

        return view('backend.setup.fee_category.add-fee-category', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $data = FeeCategory::find($id);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('setups.student.fee.category.view')->with('success', 'Edit Fee Category Group Successfully');
    }

    public function delete($id)
    {
        $class = FeeCategory::find($id);


        $class->delete();
        return redirect()->route('setups.student.fee.category.view')->with('success', 'Fee Category Deleted Successfully');
    }
}
