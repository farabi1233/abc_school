<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Model\Designation;
use App\Model\EmployeeSalaryLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeRegController extends Controller
{
    public function view()
    {
       
        $data['allData']= User::where('usertype','Employee')->orderBy('id','DESC')->get();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_reg.view',$data);
    }

    public function add()
    {
        
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_reg.add',$data);
    }
    public function store(Request $request){
      
         //echo "<pre>"; print_r($request->all()); die;
        DB::transaction(function() use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();
            if($employee == null){
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if($employeeId<10){
                    $id_no = '000'.$employeeId;
                }else if($employeeId<100){
                    $id_no = '00'.$employeeId;
                }else if($employeeId<1000){
                    $id_no = '0'.$employeeId;
                }
            }else{
                $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id;
                $employeeId = $employee+1;
                if($employeeId<10){
                    $id_no = '000'.$employeeId;
                }else if($employeeId<100){
                    $id_no = '00'.$employeeId;
                }else if($employeeId<1000){
                    $id_no = '0'.$employeeId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User;
            $name_string = explode(" ", $request->name);
            $email = strtolower(end($name_string)).'-'.$final_id_no.'@sms.edu.bd';
            $user->email = $email;
            $user->usertype = "Employee";
            $user->role = "Employee";
            $code = rand(90000000,99999999);
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->id_no = $final_id_no;
            $user->name = $request->name;
            $user->fname = $request->father_name;
            $user->mnames = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion; 
            $user->salary = $request->salary; 
            $user->designation_id = $request->designation_id; 
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename   = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->effective_date = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->save();
            
        });
        //  echo "<pre>"; print_r($data); die;
        
        return redirect()->route('employees.registration.view')->with('success','Data Added Successfully');
    }
    public function edit($employee_id)
    {
       $data['editData']= User::where('usertype','Employee')->where('id',$employee_id)->orderBy('id','DESC')->first()->toArray();
       $data['designations'] = Designation::all();
        // echo "<pre>"; print_r($data); die;
        return view('backend.employee.employee_reg.add',$data);
    }
    public function update(Request $request,$employee_id)
    {
        
        $user = User::where('id',$employee_id)->first();
        $user->name = $request->name;
        $name_string = explode(" ", $request->name);
        $email = strtolower(end($name_string)).'-'.$user->id_no.'@sms.edu.bd';
        $user->email = $email;
        $user->fname = $request->father_name;
        $user->mnames = $request->mother_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion; 
        $user->designation_id = $request->designation_id; 
        $user->dob = date('Y-m-d',strtotime($request->dob));
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/' . $user->image));

            $filename   = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $filename);
            $user['image'] = $filename;
        }
        $user->save();
       
        return redirect()->route('employees.registration.view')->with('success','Data Edited Successfully');
    }
    public function details($employee_id)
    {
        $data['details'] = User::where('id',$employee_id)->first()->toArray();
        // return view('backend.employee.employee_reg.details-pdf',$data);die;
        $pdf = PDF::loadView('backend.employee.employee_reg.details-pdf', $data);
        return $pdf->stream('Employee-'.$data['details']['id_no'].'.pdf');
    }
}
