<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SpecController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_spec()
    {
        $this->check();
        $cate_special = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.spec.add_spec')->with('cate_special',$cate_special);
    }
    public function all_spec()
    {
        $this->check();
        $all_spec = DB::table('tbl_spec')
        ->join('tbl_category', 'tbl_spec.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_spec.special_id','desc')
         ->get();
        $manager_special = view('admin.spec.all_spec')->with('all_spec',$all_spec);
        return view('admin_layout')->with('admin.spec.all_spec',$manager_special);
    }
    public function save_spec(Request $request)
    {
        $this->check();
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['zalo'] = $request->zalo;
        $data['category_id'] = $request->cate_special;
            DB::table('tbl_spec')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-spec');
        }

    public function edit_spec($spec_id){
        $this->check();
        $cate_spec = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_spec = DB::table('tbl_spec')->where('special_id',$spec_id)->get();
        $manager_special = view('admin.spec.edit_spec')->with('edit_spec',$edit_spec)->with('cate_spec',$cate_spec);
        return view('admin_layout')->with('admin.spec.edit_spec',$manager_special);
    }
    public function update_spec(Request $request,$special_id){
        $this->check();
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['zalo'] = $request->zalo;
        DB::table('tbl_spec')->where('special_id',$special_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-spec');
    }
    public function delete_spec($special_id){
        $this->check();
        DB::table('tbl_spec')->where('special_id',$special_id)->delete();
        return Redirect::to('all-spec');
    }
    //end

}
