<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Error;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Mockery\Undefined;

session_start();

class ProductController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product()
    {
        $this->check();
        $cate_product = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.product.add_product')->with('cate_product',$cate_product);
    }
    public function all_product()
    {
        $this->check();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_product.product_id','desc')
         ->get();
        $manager_product = view('admin.product.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.product.all_product',$manager_product);
    }
    public function save_product(Request $request)
    {
        $this->check();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['product_tinhtrang'] = $request->product_tinhtrang;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->check();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->check();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('all-product');
    }
    //tình trạng
    public function unactive_tinhtrang($product_id){
        $this->check();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_tinhtrang'=>1]);
        return Redirect::to('all-product');
    }
    public function active_tinhtrang($product_id){
        $this->check();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_tinhtrang'=>0]);
        return Redirect::to('all-product');
    }
    //
    public function edit_product($product_id){
        $this->check();
        $cate_product = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('admin_layout')->with('admin.product.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->check();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->check();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        return Redirect::to('all-product');
    }
    //End Admin
    public function details_product($product_slug){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->where('tbl_product.product_slug',$product_slug)
         ->get();
        // foreach($show_product as $key=>$show){
        //     $show_product = $show->category_id;
        // }
        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->where('tbl_product.category_id',$category_id)->whereNotIn('tbl_product.product_slug',[$product_slug])
         ->get();
         if($product_slug){
            return view('pages.product.show_product')->with('category',$cate_product)->with('show_product',$details_product)->with('related_product',$related_product);
        }else{
            return view('pages.error');
        }

    }
}
