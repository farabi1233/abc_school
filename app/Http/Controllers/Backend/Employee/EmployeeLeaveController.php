<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Model\EmployeeLeave;
use App\Model\LeavePurposer;
use App\User;
use Illuminate\Http\Request;
use PDF;

class EmployeeLeaveController extends Controller
{
    public function view()
    {
        
        $data['allData']= EmployeeLeave::with('user','leavePurpose')->orderBy('id','DESC')->get()->toArray();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_leave.view_leave',$data);
    }
    public function add()
    {
        $data['leave_purpose'] = LeavePurposer::all();
        $data['employees'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_leave.add_leave',$data);
    }
    public function store(Request $request){

        
        if($request->leave_purpose_id == '0'){
            $leave_purpose = new LeavePurposer();
            $leave_purpose->name = $request->new_purpose;
            $leave_purpose->save();
            $leave_purpose_id = $leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employee_leave = new EmployeeLeave();
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id;
        $employee_leave->save();
       
        return redirect()->route('employees.leave.view');
    }
    public function edit($id)
    {

        
        $data['editData']= EmployeeLeave::find($id);
        $data['leave_purpose'] = LeavePurposer::all();
        $data['employees'] = User::where('usertype','Employee')->get();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_leave.add_leave',$data);
    }
    public function update(Request $request,$id)
    {
        if($request->leave_purpose_id == '0'){
            $leave_purpose = new LeavePurposer();
            $leave_purpose->name = $request->new_purpose;
            $leave_purpose->save();
            $leave_purpose_id = $leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employee_leave =  EmployeeLeave::find($id);
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id;
        $employee_leave->save();
        
        return redirect()->route('employees.leave.view')->with('success','Employee Leave Info updated Successfully');
    }
    public function details($employee_id)
    {
        $data['details'] = User::where('id',$employee_id)->first()->toArray();
        // return view('backend.employee.employee_registration.document.details_employee_pdf',$data);die;
        // return view('backend.employee.employee_reg.details-pdf',$data);die;
        $pdf = PDF::loadView('backend.employee.employee_reg.details-pdf', $data);
        return $pdf->stream('Employee-'.$data['details']['id_no'].'.pdf');
    }
}
