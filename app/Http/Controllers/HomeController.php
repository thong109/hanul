<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;


session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $cate_special = DB::table('tbl_spec')->orderBy('special_id','desc')->limit(2)->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(3)->get();
        $all_banner = DB::table('tbl_banner')->where('banner_status','0')->orderBy('banner_id','desc')->limit(4)->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('slider_id','desc')->limit(5)->get();
        $all_sponsor = DB::table('tbl_sponsor')->where('sponsor_status','0')->orderBy('sponsor_id','desc')->limit(4)->get();
        $all_course = DB::table('tbl_course')->where('course_status','0')->orderBy('course_id','desc')->limit(6)->get();
        $all_activity = DB::table('tbl_activity')->where('activity_status','0')->orderBy('activity_id','desc')->limit(6)->get();
        return view('pages.home')->with('category',$cate_product)->with('product',$all_product)->with('banner',$all_banner)->with('slider',$all_slider)->with('sponsor',$all_sponsor)->with('course',$all_course)->with('activity',$all_activity)->with('cate_special',$cate_special);

    }
    public function activity(){
        $all_activity = DB::table('tbl_activity')->where('activity_status','0')->orderBy('activity_id','desc')->limit(6)->get();
        return view('pages.activity')->with('activity',$all_activity);
    }
    public function sponsor(){
        $all_sponsor = DB::table('tbl_sponsor')->where('sponsor_status','0')->orderBy('sponsor_id','desc')->limit(6)->get();
        return view('pages.sponsor')->with('sponsor',$all_sponsor);
    }
    public function map(){
       return view('pages.map');
    }
    public function course(){
        $all_course = DB::table('tbl_course')->where('course_status','0')->orderBy('course_id','desc')->limit(6)->get();
        // $all_news = DB::table('tbl_news')->where('news_status','0')->orderBy('news_id','desc')->limit(6)->get();
        return view('pages.course')->with('course',$all_course)->with('news');
    }
    public function timkiem(Request $request){
        // $keyword = $request->keyword_submit;
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        // $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->orWhere('prodcut_price',$keyword)->get();
        $all_banner = DB::table('tbl_banner')->where('banner_status','0')->orderBy('banner_id','desc')->limit(4)->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('slider_id','desc')->limit(5)->get();
        $all_sponsor = DB::table('tbl_sponsor')->where('sponsor_status','0')->orderBy('sponsor_id','desc')->limit(4)->get();
        $all_course = DB::table('tbl_course')->where('course_status','0')->orderBy('course_id','desc')->limit(1)->get();
        $all_activity = DB::table('tbl_activity')->where('activity_status','0')->orderBy('activity_id','desc')->limit(6)->get();
        // $search_product = DB::table('tbl_product')->where('product_name','like','%'.$request->keyword.'%')->orWhere('product_price',$request->keyword)->get();
        return view('pages.product.search',compact('search_product'))->with('cate_product',$cate_product)->with('course',$all_course);

    }
}
