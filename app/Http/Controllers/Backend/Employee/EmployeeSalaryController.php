<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Model\EmployeeSalaryLog;
use App\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function view()
    {
       
        $data['allData']= User::where('usertype','Employee')->orderBy('id','DESC')->get();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_salary.view',$data);
    }
    public function increment($id)
    {
       $data['editData']= User::where('usertype','Employee')->where('id',$id)->orderBy('id','DESC')->first()->toArray();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_salary.add_employee_salary',$data);
    }
    public function store(Request $request, $id)
    {

        
        $user = User::where('id',$id)->first();
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();
        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effective_date = date('Y-m-d',strtotime($request->effective_date));
        $salaryData->save();
        
        return redirect()->route('employees.salary.view')->with('success','Employee Salary incremented Successfully');
    }
    public function details($id)
    {
       $data['details'] = User::find($id);
       $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']['id'])->get();
    //    echo "<pre>"; print_r($data); die;
       return view('backend.employee.employee_salary.employee_salary_log',$data);
    }

}
