<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Middleware\Test;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('test');
    }

    public function viewUser()
    {
        $data['allData'] = User::all();

        return view('backend.user.view-user', $data);

        // return view('backend.layouts.home');
    }
    public function addUser()
    {
        return view('backend.user.add-user');
        // return view('backend.layouts.home');
    }
    public function storeUser(Request $request)
    {

        $this->validate($request, [

            'name' => 'required',
            
            'email' => 'required|email|unique:users,email'


        ]);
        $code = rand(0000,9999);
        $data = new User();
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code =$code;
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data Addedd Successfully');
        //return view('backend.user.add-user');
        // return view('backend.layouts.home');
    }

    public function editUser($id)
    {

        $editData = User::find($id);
        return view('backend.user.edit-user', compact('editData'));
    }
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (file_exists('public/upload/user_images/' . $user->image)  && !empty($user->image)) {
           // unlink('public/upload/user_images/' . $user->image);
            @unlink('upload/user_images/' . $user->image);
        }

        $user->delete();
        return redirect()->route('users.view')->with('success', 'Data Deleted Successfully');
    }
    public function updateUser(Request $request, $id)
    {
        $editData = User::find($id);
        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();
        return redirect()->route('users.view')->with('success', 'Data Updated Successfully');
    }
   
}
