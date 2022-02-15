<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category()
    {
        $this->check();
        return view('admin.category.add_category');
    }
    public function all_category()
    {
        $this->check();
        $all_category = DB::table('tbl_category')->get();
        $manager_category = view('admin.category.all_category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.category.all_category',$manager_category);
    }
    public function save_category(Request $request)
    {
        $this->check();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-category');
    }
    public function unactive_category($category_id){
        $this->check();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
        return Redirect::to('all-category');
    }
    public function active_category($category_id){
        $this->check();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
        return Redirect::to('all-category');
    }
    public function edit_category($category_id){
        $this->check();
        $edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
        $manager_category = view('admin.category.edit_category')->with('edit_category',$edit_category);
        return view('admin_layout')->with('admin.category.edit_category',$manager_category);
    }
    public function update_category(Request $request,$category_id){
        $this->check();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        DB::table('tbl_category')->where('category_id',$category_id)->update($data);
        return Redirect::to('all-category');
    }
    public function delete_category($category_id){
        $this->check();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        return Redirect::to('all-category');
    }
    //End Function
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')->where('tbl_category.category_id', $category_id)->get();
        $category_name = DB::table('tbl_category')->where('tbl_category.category_id',$category_id)->get();
        return view('pages.category.show_category_home')->with('category',$cate_product)->with('category_id',$category_by_id)->with('category_name',$category_name);
    }
}
