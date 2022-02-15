@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm special
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-spec')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn danh mục</label>
                                    <select name="cate_special" class="form-control input-lg m-bot15">
                                        @foreach ($cate_special as $key => $cate)
                                        @if($cate->category_id==$cate->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" placeholder="Facebook">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" placeholder="Twitter">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Youtube</label>
                                    <input type="text" name="youtube" class="form-control" id="exampleInputEmail1" placeholder="Youtube">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram</label>
                                    <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" placeholder="Instagram">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Zalo</label>
                                    <input type="text" name="zalo" class="form-control" id="exampleInputEmail1" placeholder="Zalo">
                                </div>


                                <button type="submit" name="add_special" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
