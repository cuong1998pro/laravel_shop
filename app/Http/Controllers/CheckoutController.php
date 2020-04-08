<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class CheckoutController extends Controller
{
    public function login_checkout(){
        $allbrand = DB::table('tbl_brand_product')->where('brand_status', '=', '1')->orderby('brand_id', 'desc')->get();
        $allcategory = DB::table('tbl_category_product')->where('category_status' ,'=', '1')->orderby('category_id','desc')->get();
        return view("pages.login_checkout", ['allcategory' => $allcategory, 'allbrand'=>$allbrand]);
    }
    public function add_customer(Request $req){
        $data = array();
        $data['customer_name'] = $req->customer_name;
        $data['customer_email'] = $req->customer_email;
        $data['customer_password'] = $req->customer_password;
        $data['customer_phone'] = $req->customer_phone;
        $inserted = DB::table('tbl_customer')->insertgetid($data);
        Session::put('customer_id', $inserted);
        Session::put('customer_name', $req->customer_name);
        return Redirect::to('/checkout');
    }
    public function checkout(){
        return view('pages.checkout');
    }
    public function save_checkout_customer(Request $req){
        $data = array();
        $data['shipping_name'] = $req->shipping_name;
        $data['shipping_phone'] = $req->shipping_phone;
        $data['shipping_email'] = $req->shipping_email;
        $data['shipping_note'] = $req->shipping_note;
        $data['shipping_address'] = $req->shipping_address;
        $data['customer_id'] = Session::get('customer_id');
        $shipping_id = DB::table('tbh_shipping')->insertgetid($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }
    public function payment(){

    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $req){
        $email = $req->customer_email;
        $password = $req->customer_password;
        $result = DB::table('tbl_customer')->where('customer_email', $email)
        ->where('customer_password', $password)->first();
        if( $result){
        Session::put('customer_id', $result->customer_id);
        Session::put('customer_name', $result->customer_name);

        return Redirect::to('/checkout');
    }else{
        return Redirect::to('/login-checkout');
    }
    }

}

