<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $allCategory = DB::table('tbl_category_product')->get();
        return view('admin.all_category_product', ['all_category_product'=>$allCategory]);
    }
    public function save_category_product(Request $req){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $req->category_product_name;
        $data['category_desc'] = $req->category_product_description;
        $data['category_status'] = $req->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('/add-category-product');
    }
    public function active_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status'=> 1]);
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function unactive_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status'=> 0]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function edit_category_product($category_id){
        $this->AuthLogin();
        $category = DB::table('tbl_category_product')->where('category_id', $category_id)->first();
        return view('admin.edit_category_product',["category"=>$category]);
    }
    public function update_category_product(Request $req, $category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $req->category_product_name;
        $data['category_desc'] = $req->category_product_description;
        $data['category_status'] = $req->category_product_status;
        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function delete_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
        Session::put('message', 'Xoa danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    //end admin page
    public function show_category_home($category_id){
        $allproduct = DB::table('tbl_product')->where('product_status', '=', '1')->where('category_id', '=', $category_id)->orderby('product_id', 'desc')->get();
        $allbrand = DB::table('tbl_brand_product')->where('brand_status', '=', '1')->orderby('brand_id', 'desc')->get();
        $name = DB::table('tbl_category_product')->where('category_id', '=', $category_id)->first()->category_name;
        $allcategory = DB::table('tbl_category_product')->where('category_status' ,'=', '1')->orderby('category_id','desc')->get();
        return view("pages.filter_product", ['allcategory' => $allcategory, 'allbrand'=>$allbrand, 'allproduct'=>$allproduct, 'name'=>$name]);
    }
}
