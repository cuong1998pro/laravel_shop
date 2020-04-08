@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <?php $message = Session::get('message') ?>
                    @if($message)
                    <div class="alert alert-success" role="alert">
                        {!!$message!!}
                        {{Session::put('message', null)}}
                    </div>
                    @endif
                    <form role="form" action="{{URL::to("/update-product/$product->product_id")}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Tên sản phẩm:</label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập tên danh mục" value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Giá sản phẩm:</label>
                            <input name="product_price" type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Nhập giá sản phẩm" value="{{$product->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Hình ảnh sản phẩm:</label>
                            <input name="product_image" type="file" class="" id="exampleInputEmail1">
                        </div>
                        <img src="{{URL::to("uploads/product/".$product->product_image)}}" width="100">
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm:</label>
                            <textarea class="form-control" id="exampleInputPassword1"
                        name="product_description" placeholder="Mô tả danh mục">{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Nội dung sản phẩm:</label>
                            <textarea class="form-control" id="exampleInputPassword1"
                        name="product_content" placeholder="Mô tả danh mục" >{{$product->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiện sản phẩm:</label>
                            <select name="product_status" class="form-control input-sm m-bot15" id="">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm:</label>
                            <select name="category_id" class="form-control input-sm m-bot15" id="">
                                @foreach($allcategory as $key => $value)
                                    @if($value->category_id == $product->category_id)
                                        <option selected value={{$value->category_id}}>{{$value->category_name}}</option>
                                    @else
                                    <option value={{$value->category_id}}>{{$value->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm:</label>
                            <select name="brand_id" class="form-control input-sm m-bot15" id="">
                                @foreach($allbrand as $key => $value)
                                @if($value->brand_id == $product->brand_id)
                                <option selected value={{$value->brand_id}}>{{$value->brand_name}}</option>
                                @else
                                <option value={{$value->brand_id}}>{{$value->brand_name}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
@endsection
