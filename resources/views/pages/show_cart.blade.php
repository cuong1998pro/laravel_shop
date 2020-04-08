@extends('layout2')
@section('content')

<?php $cart_content = Cart::content()?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description"></td>
                        <td class="price">Gía</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng cộng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_content as $value)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('/uploads/product/'.$value->options->image)}}" alt=""
                                    width="100"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$value->name}}</a></h4>
                            <p>Mã sản phẩm: {{$value->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($value->price)}} đ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                    {{ csrf_field() }}
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$value->qty}}"
                                    autocomplete="off" size="2">
                                <input type="hidden" value="{{$value->rowId}}" name="rowId">
                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn_default">
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($value->qty* $value->price).' đ'}}</p>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Chi phí ước tính</h3>
            <p> Tính toán chi phí các sản phẩm.</p>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::subtotal()}}</span></li>
                        <li>Thuế <span>$2</span></li>
                        <li>Phí vận chuyển <span>Miễn phí</span></li>
                    </ul>
                <a class="btn btn-default check_out" href="{{URL::to('login-checkout')}}">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
@endsection
