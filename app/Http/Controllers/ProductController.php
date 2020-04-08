<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $allbrand = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();
        $allcategory = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        return view('admin.add_product', ['allbrand'=>$allbrand, 'allcategory'=>$allcategory]);
    }
    public function all_product(){
        $this->AuthLogin();
        $allproduct = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        ->orderby('product_id','desc')->get();
        return view('admin.all_product', ['all_product'=>$allproduct]);
    }
    public function save_product(Request $req){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $req->product_name;
        $data['product_price'] = $req->product_price;
        $data['product_desc'] = $req->product_description;
        $data['product_content'] = $req->product_content;
        $data['category_id'] = $req->category_id;
        $data['brand_id'] = $req->brand_id;
        $data['product_status']=$req->product_status;
        $get_image = $req->file('product_image');
        if($get_image){
            $new_image = 'product_'.rand(0,99999).$get_image->getClientOriginalName();
            $get_image->move('uploads/product',$new_image);
            $data['product_image'] = $new_image;
        }else
        $data["product_image"] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/add-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=> 1]);
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=> 0]);
        Session::put('message', 'Ẩn sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $product = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $allbrand = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();
        $allcategory = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        return view('admin.edit_product',["product"=>$product, "allbrand"=>$allbrand, "allcategory"=>$allcategory]);
    }
    public function update_product(Request $req, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $req->product_name;
        $data['product_price'] = $req->product_price;
        $data['product_desc'] = $req->product_description;
        $data['product_content'] = $req->product_content;
        $data['category_id'] = $req->category_id;
        $data['brand_id'] = $req->brand_id;
        $data['product_status']=$req->product_status;
        $get_image = $req->file('product_image');
        if($get_image){
            $new_image = 'product_'.rand(0,99999).$get_image->getClientOriginalName();
            $get_image->move('uploads/product',$new_image);
            $data['product_image'] = $new_image;
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xoa sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    //end admin
    public function details_product($product_id){
        $allbrand = DB::table('tbl_brand_product')->where('brand_status', '=', '1')->orderby('brand_id', 'desc')->get();
        $allcategory = DB::table('tbl_category_product')->where('category_status' ,'=', '1')->orderby('category_id','desc')->get();
        $details = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_id',$product_id)->first();
        $category_id = $details->category_id;
        $related_products = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->wherenotin('tbl_product.product_id',[$product_id])->get();
        return view('pages.show_details', ['allbrand'=>$allbrand, 'allcategory'=>$allcategory , 'details'=>$details, 'related_products'=> $related_products]);

    }
}
