@extends('layout')
@section('tilte', 'Thanh Toán')

@section('content')

@if (session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
@endif
<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <!-- <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Returning customer?
                    <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>

                </h3> -->
                <!-- <div id="checkout_login" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                        <form action="#">
                            <div class="form_group mb-20">
                                <label>Username or email <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group mb-25">
                                <label>Password <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group group_3 ">
                                <input value="Login" type="submit">
                                <label for="remember_box">
                                    <input id="remember_box" type="checkbox">
                                    <span> Remember me </span>
                                </label>
                            </div>
                            <a href="#">Lost your password?</a>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="user-actions mb-20">
                <!-- <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Returning customer?
                    <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>

                </h3> -->
                <!-- <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <form action="#">
                            <input placeholder="Coupon code" type="text">
                            <input value="Apply coupon" type="submit">
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <form action="{{ route('allCheckout') }}" method="post">
        @csrf
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Địa chỉ thanh toán</h3>
                    <div class="row">

                        <div class="col-lg-6 mb-30">
                            <label>Tên <span>*</span></label>
                            <input type="text" name="firstName">
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Họ <span>*</span></label>
                            <input type="text" name="lastName">
                        </div>
                        <!-- <div class="col-12 mb-30">
                            <label>Company Name</label>
                            <input type="text">
                        </div> -->
                        <!-- <div class="col-12 mb-30">
                            <label for="country">country <span>*</span></label>
                            <input type="text" name="" id="">
                        </div> -->

                        <div class="col-12 mb-30">
                            <label>Địa chỉ <span>*</span></label>
                            <input placeholder="Nhập địa chỉ của bạn" type="text" name="address">
                        </div>
                        <!-- <div class="col-12 mb-30">
                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Town / City <span>*</span></label>
                            <input type="text">
                        </div> -->
                        <!-- <div class="col-12 mb-30">
                            <label>State / County <span>*</span></label>
                            <input type="text">
                        </div> -->
                        <div class="col-lg-6 mb-30">
                            <label>Số điện thoại<span>*</span></label>
                            <input type="text" name="phone">

                        </div>
                        <div class="col-lg-6 mb-30">
                            <label> Địa chỉ email <span>*</span></label>
                            <input type="text" name="email">

                        </div>
                        <!-- <div class="col-12 mb-30">
                            <input id="account" type="checkbox" data-target="createp_account">
                            <label for="account" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">Create an account?</label>

                            <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <label> Account password <span>*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-30">
                            <input id="address" type="checkbox" data-target="createp_account">
                            <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>

                            <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                <div class="row">
                                    <div class="col-lg-6 mb-30">
                                        <label>First Name <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Company Name</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <div class="select_form_select">
                                            <label for="countru_name">country <span>*</span></label>
                                            <select name="cuntry" id="countru_name">
                                                <option value="2">bangladesh</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Ghana</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Bahrain</option>
                                                <option value="8">Colombia</option>
                                                <option value="9">Dominican Republic</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-30">
                                        <label>Street address <span>*</span></label>
                                        <input placeholder="House number and street name" type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Town / City <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>State / County <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label>Phone<span>*</span></label>
                                        <input type="text">

                                    </div>
                                    <div class="col-lg-6">
                                        <label> Email Address <span>*</span></label>
                                        <input type="text">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Order Notes</label>
                                <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- <form action="#"> -->
                    @if(count($products) > 0)
                    <h3>Đơn hàng của bạn</h3>
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $allTotal = 0;
                                @endphp
                                @foreach($products as $item)
                                @php
                                $total = $item->price * Session::get('cart')[$item->id] ;
                                $allTotal += $total;
                                @endphp
                                <tr>
                                    <td> {{ $item->title }} <strong> × {{ Session::get('cart')[$item->id] }}</strong></td>
                                    <td>{{ number_format($total) }} VND</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng phụ</th>
                                    <td>{{ number_format($allTotal) }} VND</td>
                                </tr>
                                <!-- <tr>
                    <th>Shipping</th>
                    <td><strong>$5.00</strong></td>
                </tr> -->
                                <tr class="order_total">
                                    <th>Tổng đơn hàng</th>
                                    <td><strong>{{ number_format($allTotal) }} VND</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default">
                            <!-- <input id="payment" name="check_method" type="radio" data-target="createp_account"> -->
                            <!-- <div id="method" class="collapse one" data-parent="#accordion">
                <div class="card-body1">
                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                </div>
            </div> -->
                        </div>
                        <div class="panel-default">
                            <!-- <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">
            <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets\img\visha\papyel.png" alt=""></label> -->

                            <!-- <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                <div class="card-body1">
                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                </div>
            </div> -->
                            @else
                            <h4>Giỏ hàng đang trống</h4>
                            @endif
                        </div>
                        <div class="order_button">
                            <button type="submit" onclick="return checkOut()">Thanh toán khi nhận hàng </button>
                        </div>
                    </div>
            </form>
    <br>
    <div class="order_button">
        <form action="{{route('thanhtoan_vnpay')}}" method="post">
        @csrf
            <input type="hidden" name="firstName" id="vnpay-firstName">
            <input type="hidden" name="lastName" id="vnpay-lastName">
            <input type="hidden" name="address" id="vnpay-address">
            <input type="hidden" name="phone" id="vnpay-phone">
            <input type="hidden" name="email" id="vnpay-email">
            <input type="hidden" name="total_vnpay" value="{{$allTotal}}">
            <button type="submit" name="redirect" onclick="return prepareVNPayForm()" >Thanh toán VNPay</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
<!--Checkout page section end-->
@endsection