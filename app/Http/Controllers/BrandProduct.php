<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $allbrand = DB::table('tbl_brand_product')->get();
        return view('admin.all_brand_product', ['all_brand_product'=>$allbrand]);
    }
    public function save_brand_product(Request $req){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $req->brand_product_name;
        $data['brand_desc'] = $req->brand_product_description;
        $data['brand_status'] = $req->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('/add-brand-product');
    }
    public function active_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update(['brand_status'=> 1]);
        Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('/all-brand-product');
    }
    public function unactive_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update(['brand_status'=> 0]);
        Session::put('message', 'Ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('/all-brand-product');
    }
    public function edit_brand_product($brand_id){
        $this->AuthLogin();
        $brand = DB::table('tbl_brand_product')->where('brand_id', $brand_id)->first();
        return view('admin.edit_brand_product',["brand"=>$brand]);
    }
    public function update_brand_product(Request $req, $brand_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $req->brand_product_name;
        $data['brand_desc'] = $req->brand_product_description;
        $data['brand_status'] = $req->brand_product_status;
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('/all-brand-product');
    }
    public function delete_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->delete();
        Session::put('message', 'Xoa thương hiệu sản phẩm thành công');
        return Redirect::to('/all-brand-product');
    }
    public function show_brand_home($brand_id){
        $allproduct = DB::table('tbl_product')->where('product_status', '=', '1')->where('brand_id', '=', $brand_id)->orderby('product_id', 'desc')->get();
        $allbrand = DB::table('tbl_brand_product')->where('brand_status', '=', '1')->orderby('brand_id', 'desc')->get();
        $name = DB::table('tbl_brand_product')->where('brand_id', '=', $brand_id)->first()->brand_name;
        $allcategory = DB::table('tbl_category_product')->where('category_status' ,'=', '1')->orderby('category_id','desc')->get();
        return view("pages.filter_product", ['allcategory' => $allcategory, 'allbrand'=>$allbrand, 'allproduct'=>$allproduct, 'name'=>$name]);
    }
}
