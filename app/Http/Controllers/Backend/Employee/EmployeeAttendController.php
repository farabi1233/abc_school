<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Model\EmployeeAttendance;
use App\User;
use Illuminate\Http\Request;

class EmployeeAttendController extends Controller
{
    public function view()
    {
        $data['allData']= EmployeeAttendance::with('user')->select('date')->groupBy('date')->orderBy('id','ASC')->get()->toArray();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_attendance.view_attendance',$data);
    }
    public function add()
    {
        $data['employees'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_attendance.add_attendance',$data);
    }
    public function store(Request $request){
        
        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for($i = 0 ; $i < $countemployee; $i++){
            $attendance = new EmployeeAttendance();
            $attendance->date = date('Y-m-d', strtotime($request->date));
            $attendance->employee_id = $request->employee_id[$i];
            $attendance->attendance_status	 = $request['attendance_status'.$i];
            $attendance->save();
        }
       
        return redirect()->route('employees.attendance.view')->with('success','Employee Attendance Saved Successfully');
    }
    public function edit($date)
    {
        $data['editData']= EmployeeAttendance::with('user')->where('date',$date)->get()->toArray();
        $data['employees'] = User::where('usertype','Employee')->get()->toArray();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_attendance.add_attendance',$data);
    }
    public function details($date)
    {
        $data['details']= EmployeeAttendance::with('user')->where('date',$date)->get()->toArray();
        //   echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_attendance.details_attendance',$data);
        // $pdf = PDF::loadView('backend.employee.employee_attendance.details_attendance', $data);
        // return $pdf->stream('Employee-Attendance-Report-'.date('d-m-Y',strtotime($date)).'.pdf');
    }
}
