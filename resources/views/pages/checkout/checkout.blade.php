@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">

        <div class="register-req">
            <p>Làm ơn đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-10 clearfix">
                    <div class="bill-to">
                        <p>Thông tin gửi hàng</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save-checkout')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Email*" name="shipping_email">
                                <input type="text" placeholder="Họ tên" name="shipping_name">
                                <input type="text" placeholder="Địa chỉ" name="shipping_address">
                                <input type="text" placeholder="Điện thoại" name="shipping_phone">
                                <input type="submit" value="Thanh toán" name="send_order" class="btn btn-primary btn-sm">
                                <textarea name="shipping_note"  placeholder="Ghi chú" rows="16"></textarea>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>


        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->

@endsection
