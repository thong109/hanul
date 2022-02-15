<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id){
    	    return Redirect::to('dashboard');
        }else{
            return view('admin_login');
        }
    }

    public function showdashboard(){
        $this->check();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
            // return view('admin.dashboard');
            // print_r($result);
        if($result){
            Session::put(['admin_name' => $result->admin_name]);
            Session::put(['admin_id' => $result->admin_id]);
            return Redirect::to('/dashboard');
        }else{
            // Session::put('message',"Làm ơn nhập lại");
            Session::put(['message' => "Nhap lai"]);
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->check();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}