@extends('layout')
@section('content')
<!--======= HOME MAIN SLIDER =========-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div id="slider">
    <div class="slides">
        @foreach ($banner as $key => $banner)
        <div class="slider">
            <div class="legend"></div>
            <div class="content">
                <div class="content-txt">
                    <h1>{{$banner->banner_content}}</h1>
                    <h2>{{$banner->banner_desc}}</h2>
                </div>
            </div>
            <div class="image">
                <img src="{{URL::to('/public/uploads/product/'.$banner->banner_image)}}">
            </div>
        </div>
        @endforeach
    </div>

</div>
<section class="slider-ngang padding-top-50">
    <marquee id="marq" scrollamount="10" direction="left" loop="forever" scrolldelay="0" behavior="scroll">
        @foreach ($slider as $key=>$sli)
        <a><img src="{{asset('public/uploads/product/'.$sli->slider_image)}}" width="300" class="marquee"/></a>
        @endforeach
    </marquee>
</section >
<!-- Khoa hoc -->
<section class="padding-top-50 padding-bottom-150">
    <div class="container ">
        <div class="heading text-center">
            <h4>Chào mừng đến với Trung tâm Huấn luyện Taekwondo Hanul!</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
        <div class="flexbox_">
            <div class="col-md-5 asti p_0 gridbox_">
                <div class="our_amazing_option_1 ">
                    <a href="{{URL::to('/course')}}">
                        <div class="course">
                            <div class="course-image">
                                <img src="{{URL::to('/public/frontend/images/khoahoc.jpg')}}" alt="" class="image-cou">
                                <div class="read">
                                    <span>Read more</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="our_amazing_option_1 ">
                    <a href="{{URL::to('/sponsor')}}">
                        <div class="course">
                            <div class="course-image-1">
                                <img src="{{URL::to('/public/frontend/images/khoahoc.jpg')}}" alt="" class="image-cou">
                                <div class="read">
                                    <span>Read more</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-7 hiasti p_0">
                <a href="{{URL::to('/activity')}}">
                    <div class="item w_100">
                        <!-- Images -->
                        <img class="img-1" src="{{URL::to('/public/frontend/images/khoahoc.jpg')}}" alt="" >
                        <div class="read">
                            <span>Read more</span>
                        </div>
                        <!-- Overlay  -->
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Gioithieu -->
<section class="padding-top-50 padding-bottom-150" id="gioithieu">
    <div class="container block">
        <div class="col-md-12">
            <div class="heading text-center">
                <h4>Tin tức</h4>
                <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
            </div>
            <div class="tintuc">
                @foreach ($product as $key => $pro)
                <figure class="snip1563">
                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="sample110" />
                    <figcaption>
                        <h3>{{$pro->product_name}}</h3>
                        <p>{{$pro->product_desc}}</p>
                    </figcaption>
                    <a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_slug)}}"></a>
                </figure>
                @endforeach
            </div>
        </div>
        {{--
        <div class="col-md-6">
            <!-- Main Heading -->
            <div class="heading text-center" id="khoahoc">
                <h4>Khoa hoc</h4>
                <div style="border-bottom: 1px solid white;margin-bottom: 20px;"></div>
            </div>
            {{--
            <div class="arrival-block-1">
                @foreach ($course as $key => $course )
                <!-- Item -->
                <div class="item">
                    <!-- Images -->
                    <img class="img-1" src="{{asset('public/uploads/product/'.$course->course_image)}}" alt="" > <img class="img-2" src="{{asset('public/uploads/product/'.$course->course_image)}}" alt="" >
                    <!-- Overlay  -->
                    <div class="overlay">
                        <!-- Price -->
                        <div class="position-center-center"> <a href="{{URL::to('chi-tiet-course/'.$course->course_id)}}"><i class="fa fa-search"></i></a> </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name">
                        <a href="#">{{$course->course_name}}</a>
                    </div>
                </div>
                @endforeach
            </div>
            --}}
            {{--
        </div>
        --}}
    </div>
</section>
<!-- Hoatdong -->
<section class="padding-top-50"id="hoatdong">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center" >
            <h4>Hoạt động</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
    </div>
    <!-- New Arrival -->
    <div class="arrival-block container">
        <!-- Item -->@foreach ($activity as $key =>$acti)
        <div class="item">
            <!-- Images -->
            <img class="img-1" src="{{asset('public/uploads/product/'.$acti->activity_image)}}" alt="" > <img class="img-2" src="{{asset('public/uploads/product/'.$acti->activity_image)}}" alt="" >
            <!-- Overlay  -->
            <div class="overlay">
                <!-- Price -->
                <div class="position-center-center"> <a href="{{asset('public/uploads/product/'.$acti->activity_image)}}" data-lighter><i class="fa fa-eye"> Preview</i></a> </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Quy tu thien -->
<section class="padding-top-50 padding-bottom-150">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center" id="khoahoc">
            <h4>Nhà tài trợ và hệ thống phòng tập Hanul</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
        <div class="arrival-block-2">
            @foreach ($sponsor as $key=>$pon)
            <!-- Item -->
            <div class="item">
                <!-- Images -->
                <img class="img-1" src="{{URL::to('/public/uploads/product/'.$pon->sponsor_image)}}" alt="" > <img class="img-2" src="{{URL::to('/public/uploads/product/'.$pon->sponsor_image)}}" alt="" >
                <!-- Overlay  -->
                <div class="overlay">
                    <!-- Price -->
                    <div class="position-center-center"> <a href=""  target="_blank"><i class="fa fa-facebook"></i></a> </div>
                </div>
                <!-- Item Name -->
                <div class="item-name">
                    <a href="#">{{$pon->sponsor_name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About -->
<section class="small-about padding-bottom-150">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center">
            <h4>Đặt biệt</h4>
            <div style="border-bottom: 1px solid white; margin-bottom: 10px;"></div>
            <p>Mạng xã hội</p>
        </div>
        <!-- Social Icons -->@foreach ($cate_special as $key =>$special)

        @endforeach
        <ul class="social_icons">
            <li><a href="{{$special->facebook}}"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{$special->twitter}}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{$special->youtube}}"><i class="fa fa-tumblr"></i></a></li>
            <li><a href="{{$special->instagram}}"><i class="fa fa-youtube"></i></a></li>
            <li><a href="{{$special->zalo}}"><i class="fa fa-dribbble"></i></a></li>
        </ul>
    </div>
</section>
<a href="#" class="cd-top text-replace js-cd-top">Top</a>
@endsection
