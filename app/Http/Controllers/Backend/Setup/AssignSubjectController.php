<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\AssignSubject;
use App\Model\StudentClass;
use App\Model\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function view()
    {


        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view-assign-subject', $data);
    }


    public function add()
    {

        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();


        return view('backend.setup.assign_subject.add-assign-subject', $data);
    }

    public function store(Request $request)
    {


        $subjectCount = count($request->subject_id);
        if ($subjectCount != NULL) {
            for ($i = 0; $i < $subjectCount; $i++) {
                $assign_sub = new AssignSubject();
                $assign_sub->class_id = $request->class_id;
                $assign_sub->subject_id = $request->subject_id[$i];
                $assign_sub->full_mark = $request->full_mark[$i];
                $assign_sub->pass_mark = $request->pass_mark[$i];
                $assign_sub->subjective_mark = $request->subjective_mark[$i];
                $assign_sub->save();
            }
            toastr()->success('Assign Subject Added  ', 'Added Successfully');
            return redirect()->route('setups.assign.subject.view');
        }
    }


    public function edit($class_id)
    {

        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('class_id', 'asc')->get();
        //dd($data['subjects']->toArray());

        return view('backend.setup.assign_subject.edit-assign-subject', $data);
    }
    public function update(Request $request, $class_id)
    {
        if($request['subject_id'] == null){
            
            return redirect()->back()->with('error','you do not select or update any field ');
        }else{
            AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)->delete();
            foreach ($request->subject_id as $key => $value) {
                $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
                if($assign_subject_exist){
                    $assignSubject = $assign_subject_exist;
                }else{
                    $assignSubject = new AssignSubject();
                }
                $assignSubject['class_id'] = $request['class_id'];
                $assignSubject['subject_id'] = $request['subject_id'][$key];
                $assignSubject['full_mark'] = $request['full_mark'][$key];
                $assignSubject['pass_mark'] = $request['pass_mark'][$key];
                $assignSubject['subjective_mark'] = $request['subjective_mark'][$key];
                $assignSubject->save();
            }
        }
        toastr()->success('Asign Subject Updated', 'Update Successfully');

            return redirect()->route('setups.assign.subject.view');
        }



    public function details($class_id)
    {

        $data['allData'] = AssignSubject::where('class_id', $class_id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.assign_subject.details-assign-subject', $data);
    }
}
