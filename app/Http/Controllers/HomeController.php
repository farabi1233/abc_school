<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $data['all_admins'] = User::where('usertype','Admin')->get()->count();
        $data['all_users'] = User::get()->count();
      
        $data['all_students'] = User::where('usertype','Student')->get()->count();
        $data['all_employees'] = User::where('usertype','Employee')->get()->count();
        return view('backend.layouts.home',$data);
    }
}
