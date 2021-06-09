<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmmount;
use App\Model\StudentClass;
use Illuminate\Http\Request;

class FeeAmmountController extends Controller
{
    public function view()
    {

        $data['allData'] = FeeCategoryAmmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_ammount.view-fee-ammount', $data);
    }


    public function add()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();


        return view('backend.setup.fee_ammount.add-fee-ammount', $data);
    }

    public function store(Request $request)
    {


        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_ammount = new FeeCategoryAmmount();
                $fee_ammount->fee_category_id = $request->fee_category_id;
                $fee_ammount->class_id = $request->class_id[$i];
                $fee_ammount->amount = $request->ammount[$i];
                $fee_ammount->save();
            }
            return redirect()->route('setups.student.fee.ammount.view')->with('success', 'Fee Ammount addedd Successfully');
        }
    }


    public function edit($fee_category_id)
    {

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        $data['editData'] = FeeCategoryAmmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_ammount.edit-fee-ammount', $data);
    }
    public function update(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            return redirect()->back()->with('error', 'Sorry!!! You do not select any class!');
        } else {
            FeeCategoryAmmount::where('fee_category_id', $fee_category_id)->delete();
            $countClass = count($request->class_id);

            for ($i = 0; $i < $countClass; $i++) {
                $fee_ammount = new FeeCategoryAmmount();
                $fee_ammount->fee_category_id = $request->fee_category_id;
                $fee_ammount->class_id = $request->class_id[$i];
                $fee_ammount->amount = $request->ammount[$i];
                $fee_ammount->save();
            }
            return redirect()->route('setups.student.fee.ammount.view')->with('success', 'Fee Ammount Edited Successfully');
        }
    }


    public function details($fee_category_id)
    {
        
        $data['allData'] = FeeCategoryAmmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_ammount.details-fee-ammount', $data);
    }
}
