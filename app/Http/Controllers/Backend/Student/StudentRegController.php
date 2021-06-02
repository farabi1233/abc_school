<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentRegController extends Controller
{
    public function view()
    {

        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::orderBy('id','asc')->get();
        $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
        
        
        
        $data['allData'] = AssignStudent::where('class_id',$data['class_id'])->where('year_id',$data['year_id'] )->get();
        //$data['countLogo'] = Slider::count();
        //dd($data['countLogo']);
        return view('backend.student.student_reg.view', $data);
    }
    public function add()
    {
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::orderBy('id','asc')->get();
        $data['groups'] = StudentGroup::orderBy('id','desc')->get();
        $data['shifts'] = StudentShift::orderBy('id','desc')->get();
        return view('backend.student.student_reg.add', $data);
    }



    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {

            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                }
                if ($studentId < 100) {
                    $id_no = '00' . $studentId;
                }
                if ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                } 
            }else {
                    $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();
                    //dd($student);
                    $studentId = $student->id + 1;
                    if ($studentId < 10) {
                        $id_no = '000' . $studentId;
                    }
                    if ($studentId < 100) {
                        $id_no = '00' . $studentId;
                    }
                    if ($studentId < 1000) {
                        $id_no = '0' . $studentId;
                    }
                }
                $final_id_no = $checkYear . $id_no;
                $code = rand(0000,9999);
                
                $user = new User();
                $user->id_no = $final_id_no;
                $user->password = bcrypt($code);
                $user->usertype = 'Student';
                $user->code =$code;
                $user->name = $request->name;
                $user->fname = $request->fname;
                $user->mnames = $request->mname;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                $user->gender = $request->gender;
                $user->dob = date('Y-m-d', strtotime($request->dob));
                if ($request->file('image')) {
                    $file = $request->file('image');

                    $filename   = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/student_images'), $filename);
                    $user['image'] = $filename;
                }
                $user->save();

                $assign_student = new AssignStudent();
                $assign_student->student_id = $user->id;
                $assign_student->year_id = $request->year_id;
                $assign_student->class_id = $request->class_id;
                $assign_student->group_id = $request->group_id;
                $assign_student->shift_id = $request->shift_id;
                $assign_student->save();

                $discount_student = new DiscountStudent();
                $discount_student->assign_student_id = $assign_student->id;
                $discount_student->discount = $request->discount;
                $discount_student->save();
            
        });
        
        return redirect()->route('students.registration.view')->with('success','Data Inserted Successfully');



    }
    public function yearClassWise(Request $request)
    {
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::orderBy('id','asc')->get();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        
        
        
        $data['allData'] = AssignStudent::where('class_id',$data['class_id'])->where('year_id',$data['year_id'] )->get();
        //$data['countLogo'] = Slider::count();
        //dd($data['countLogo']);
        return view('backend.student.student_reg.view', $data);
    }
    public function edit($student_id)
    {
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
      // dd($data['editData']->toArray());
      // dd($data['editData']->id);
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_reg.add', $data);
    }
    public function update(Request $request, $student_id)
    {
        
        DB::transaction(function () use ($request,$student_id) {

          
                $user = User::where('id',$student_id)->first();
                
              
                $user->name = $request->name;
                $user->fname = $request->fname;
                $user->mnames = $request->mname;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                $user->gender = $request->gender;
                $user->dob = date('Y-m-d', strtotime($request->dob));
                if ($request->file('image')) {
                    $file = $request->file('image');
                    @unlink(public_path('upload/student_images/' . $user->image));

                    $filename   = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/student_images'), $filename);
                    $user['image'] = $filename;
                }
                $user->save();

                $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
                
                $assign_student->year_id = $request->year_id;
                $assign_student->class_id = $request->class_id;
                $assign_student->group_id = $request->group_id;
                $assign_student->shift_id = $request->shift_id;
                $assign_student->save();

                $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
                
                $discount_student->discount = $request->discount;
                $discount_student->save();
            
        });
        
        return redirect()->route('students.registration.view')->with('success','Data Updated Successfully');
    }

    public function deleteSlider($id)
    {
        $slider = Slider::find($id);

        if (file_exists('upload/slider_images/' . $slider->image)  && !empty($slider->image)) {
            unlink('upload/slider_images/' . $slider->image);
        }

        $slider->delete();
        return redirect()->route('sliders.view')->with('success', 'Slider Deleted Successfully');
    }
}
