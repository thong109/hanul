@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm hoạt động
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-activity')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn danh mục</label>
                                    <select name="activity_cate" class="form-control input-lg m-bot15">
                                        @foreach ($cate_activity as $key => $cate)
                                        @if($cate->category_id==$cate->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên activity</label>
                                    <input type="text" name="activity_name" class="form-control" id="exampleInputEmail1" placeholder="Tên activity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh activity</label>
                                    <input type="file" name="activity_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả activity</label>
                                    <input class="form-control" id="exampleInputPassword1" placeholder="Mô tả activity" name="activity_desc">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="activity_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>

                                <button type="submit" name="add_activity" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
