<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    public function viewProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);



        return view('backend.user.view-profile', compact('user'));

        // return view('backend.layouts.home');
    }
    public function editProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('backend.user.edit-profile', compact('editData'));
        // return view('backend.layouts.home');
    }

    public function updateProfile(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename   = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        return redirect()->route('profiles.view')->with('success', 'Profile Updated Successfully');
    }
    public function passwordView()
    {
        return view('backend.user.edit-password');
    }
    public function passwordUpdate(Request $request)
    {
        

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->confirm_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success', 'Password update Successfully');
        } else {
            return redirect()->back()->with('error', 'Sorry your corrent password dose not match');
        }
    }

    //
}
