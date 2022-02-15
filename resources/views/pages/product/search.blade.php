@extends('layout')
@section('content')

<section>

<h4>Tìm thấy {{count($search_product)}} sản phẩm</h4>
<?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
@foreach ($search_product as $key =>$product)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="single-products">
            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                <h2>{{number_format($product->product_price).' '.'VND'}}</h2>
                <p>{{$product->product_name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
        </div>
        </a>
    </div>
</div>

@endforeach
</section>

@endsection
