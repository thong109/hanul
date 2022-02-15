@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Cập nhật nhà tài trợ
                        </header>
                        <div class="panel-body">
                            @foreach ($edit_spec as $key => $edit_spec)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-spec/'.$edit_spec->special_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn danh mục</label>
                                        <select name="spec_cate" class="form-control input-lg m-bot15">
                                            @foreach ($cate_spec as $key => $cate)
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" value="{{$edit_spec->facebook}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" value="{{$edit_spec->twitter}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram</label>
                                    <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" value="{{$edit_spec->instagram}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Youtube</label>
                                    <input type="text" name="youtube" class="form-control" id="exampleInputEmail1" value="{{$edit_spec->youtube}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Zalo</label>
                                    <input type="text" name="zalo" class="form-control" id="exampleInputEmail1" value="{{$edit_spec->zalo}}" >
                                </div>

                                <button type="submit" name="update_spec" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection
