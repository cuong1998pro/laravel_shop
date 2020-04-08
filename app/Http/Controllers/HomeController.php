<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $allbrand = DB::table('tbl_brand_product')->where('brand_status', '=', '1')->orderby('brand_id', 'desc')->get();
        $allcategory = DB::table('tbl_category_product')->where('category_status' ,'=', '1')->orderby('category_id','desc')->get();
        $allproduct = DB::table('tbl_product')->where('product_status', '=', '1')->orderby('product_id', 'desc')->get();
        return view("pages.home", ['allcategory' => $allcategory, 'allbrand'=>$allbrand, 'allproduct'=>$allproduct]);
    }

}
