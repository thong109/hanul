@extends('layout')
@section('content')

@foreach ($show_product as $key=>$show)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt="">
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item">
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                    </div>
                    <div class="item active">
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                      <a href=""><img src="{{asset('/public/uploads/product/'.$show->product_image)}}" alt=""></a>
                    </div>

                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="">
            <h2>{{$show->product_name}}</h2>
            <label>Thương hiệu :</label>
            <span>{{$show->category_name}}</span>
            <img src="images/product-details/rating.png" alt="">
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{ csrf_field() }}
                <span>
                    <label>Giá :</label>
                    <span>{{number_format($show->product_price)}} VNĐ</span><br>
                    <label>Số lượng :</label>
                    <input type="number" name="qty" min="1" min="0" oninput="validity.valid||(value='');" value="1">
                    <input type="hidden" name="productid_hidden" value="{{$show->product_id}}"><br>
                    <label>Trạng thái :</label>
                    <?php
                    if($show->product_tinhtrang==0){
                ?>
                        <span>Hết hàng</span><br>
                        <label>Thông tin nổi bật :</label><br>
                        <span class="infot">{{$show->product_desc}}</span><br><br>
                        <a class="btn btn-fefault cart">
                        <strike>Hết hàng</strike>
                        </a>
                    <?php
                    }else{
                    ?>
                       <span>Còn hàng</span><br>
                       <label>Thông tin nổi bật :</label><br>
                       <span class="infot">{{$show->product_desc}}</span><br><br>
                       <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                       Thêm vào giỏ hàng
                    </button>
                    <?php
                    }
                 ?>
                    <br>

                </span>
            </form>

        </div><!--/product-information-->
    </div>

</div>
@endforeach
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tag" data-toggle="tab">Mô tả sản phẩm</a></li>
            <li class=""><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li class=""><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tag">
            <p>{{$show->product_content}}</p>
        </div>
        <div class="tab-pane fade" id="companyprofile">
            <p>{{$show->product_desc}}</p>
        </div>
        <div class="tab-pane fade" id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name">
                        <input type="email" placeholder="Email Address">
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="">
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($related_product as $key => $lienquan_pro)
            <div class="item active">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <a href="{{URL::to('chi-tiet-san-pham/'.$lienquan_pro->product_slug)}}">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to('public/uploads/product/'.$lienquan_pro->product_image)}}" alt="">
                                    <h2>{{number_format($lienquan_pro->product_price)}} VND</h2>
                                    <p>{{$lienquan_pro->product_name}}</p>
                                    <button  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> <a href="{{URL::to('chi-tiet-san-pham/'.$lienquan_pro->product_slug)}}">Xem sản phẩm</a></button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
    </div>
</div>
@endsection
