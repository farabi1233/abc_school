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


        $data['allData'] = AssignStudent::all();
        //$data['countLogo'] = Slider::count();
        //dd($data['countLogo']);
        return view('backend.student.student_reg.view', $data);
    }
    public function add()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
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
    public function editSlider($id)
    {
        $editData = Slider::find($id);
        //dd( $editData);
        return view('backend.slider.edit-slider', compact('editData'));
    }
    public function updateSlider(Request $request, $id)
    {
        $data = Slider::find($id);
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->update_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/slider_images/' . $data->image));
            $filename   = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'), $filename);
            $data['image'] = $filename;
        }


        $data->save();
        return redirect()->route('sliders.view')->with('success', 'Edit Slider Successfully');
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
