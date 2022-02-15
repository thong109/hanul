@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm tin tức
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn danh mục</label>
                                    <select name="product_cate" class="form-control input-lg m-bot15">
                                        @foreach ($cate_product as $key => $cate)
                                        @if($cate->category_id==$cate->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tin tức</label>
                                    <input type="text" name="product_name" class="form-control" id="name" placeholder="Tên tin tức">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="product_slug" class="form-control" id="slug" placeholder="Tên tin tức">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh tin tức</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" min="0" oninput="this.value = Math.abs(this.value)">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả tin tức</label>
                                    <textarea class="form-control" id="exampleInputPassword1" placeholder="Mô tả tin tức" name="product_desc"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung tin tức</label>
                                    <input class="form-control" id="exampleInputPassword1" placeholder="Nội dung tin tức" name="product_content">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tình trạng</label>
                                    <select name="product_tinhtrang" class="form-control input-lg m-bot15">
                                        <option value="0">Còn hàng</option>
                                        <option value="1">Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            {{-- @section('js') --}}
@endsection
