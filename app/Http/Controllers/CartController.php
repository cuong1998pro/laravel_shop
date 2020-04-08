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

class CartController extends Controller
{
    public function save_cart(Request $req){
        $quantity = $req->quantity;
        $product_id = $req->product_id_hidden;
        $product = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $data['id'] = $product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_price;
        $data['weight'] = 0;
        $data['options']['image'] = $product->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $allcategory = DB::table('tbl_category_product')->where('category_status' ,'=', '1')->orderby('category_id','desc')->get();
        $allbrand = DB::table('tbl_brand_product')->where('brand_status', '=', '1')->orderby('brand_id', 'desc')->get();
        return view('pages.show_cart', ['allbrand'=> $allbrand, 'allcategory'=>$allcategory]);

    }
    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $req){
        $rowId = $req->rowId;
        $quantity = $req->quantity;
        Cart::update($rowId, $quantity);
        return Redirect::to('/show-cart');
    }
}
