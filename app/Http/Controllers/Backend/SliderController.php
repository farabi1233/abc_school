<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function viewSlider()
    {
       
        $data['allData'] = Slider::all();
        //$data['countLogo'] = Slider::count();
        //dd($data['countLogo']);

        return view('backend.slider.view-slider', $data);

        // return view('backend.layouts.home');
    }
    public function addSlider()
    {
        return view('backend.slider.add-slider');
    }
  
    public function storeSlider(Request $request)
    {

    
        $data = new Slider();

        $data->createy_by = Auth::user()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        if ($request->file('image')) {
            $file = $request->file('image');
            
            $filename   = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'), $filename);
            $data['image'] = $filename;
        }

        
        $data->save();
        return redirect()->route('sliders.view')->with('success', 'Slider Added Successfully');
        //return view('backend.user.add-user');
        // return view('backend.layouts.home');
    }
    public function editSlider($id)
    {
        $editData = Slider::find($id);
        //dd( $editData);
        return view('backend.slider.edit-slider',compact('editData'));
    }
    public function updateSlider(Request $request,$id)
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

        if (file_exists('upload/slider_images/' . $slider->image)  &&! empty($slider->image)) {
            unlink('upload/slider_images/' . $slider->image);
        }

        $slider->delete();
        return redirect()->route('sliders.view')->with('success', 'Slider Deleted Successfully');
    }
}
