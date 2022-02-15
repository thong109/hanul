@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-category')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <input style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục" name="category_desc">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="category_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
