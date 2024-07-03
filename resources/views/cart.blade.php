@extends('layout')
@section('tilte', 'Trang chủ')

@section('content')
<!--shopping cart area start -->
<div class="shopping_cart_area">
    <!-- <form action="#"> -->
    @if(count($products)> 0)
    <div class="row">
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Xóa</th>
                                    <th class="product_thumb">Hình ảnh</th>
                                    <th class="product_name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product_quantity">Số lượng</th>
                                    <th class="product_total">Tổng tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $allTotal = 0;
                                @endphp
                                @foreach($products as $item)
                                @php
                                $total = $item->price * Session::get('cart')[$item->id];
                                $allTotal += $total;
                                @endphp
                                <tr>
                                    <td class="product_remove"><a href="{{ route('delCart',['id'=>$item->id]) }}"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{ asset('uploads/'.$item->image) }}" alt="" style="width: 120px;"></a></td>
                                    <td class="product_name"><a href="#">{{ $item['title'] }}</a></td>
                                    <td class="product-price">{{ number_format($item->price) }} VND</td>
                                    <td class="product_quantity"><input min="0" max="100" name="product_id[{{$item->id }}]" value="{{ Session::get('cart')[$item->id] }}" type="number"></td>
                                    <td class="product_total">{{ number_format($total) }} VND</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart_submit">
                        <button formaction="/updateCart">Cập nhật đơn hàng</button>
                    </div>
                </div>
            </div>
            <!-- </form> -->
    </div>
    <!--coupon code area start-->
    <div class="coupon_area">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="coupon_code">
                    <h3>Phiếu giảm giá</h3>
                    <div class="coupon_inner">
                        <p>Nhập mã giảm giá nếu bạn có</p>
                        <input placeholder="Nhập mã" type="text">
                        <button type="submit">Nhập</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="coupon_code">
                    <h3>Tổng đơn hành</h3>
                    <div class="coupon_inner">
                        <div class="cart_subtotal">
                            <p>Tổng phụ</p>
                            <p class="cart_amount">{{ number_format($allTotal) }} VND</p>
                        </div>
                        <!-- <div class="cart_subtotal ">
                                <p>Chuyển hàng</p>
                                <p class="cart_amount"><span>Giá cố định:</span> £255.00</p>
                            </div> -->
                        <a href="#">Tính toán vận chuyển</a>

                        <div class="cart_subtotal">
                            <p>Tổng tiền</p>
                            <p class="cart_amount">{{ number_format($allTotal) }} VND</p>
                        </div>
                        <div class="checkout_btn">
                            <button type="submit"> Xác nhận thanh toán </button>
                        </div>
                        @else
                            <h4>Giỏ hàng trống</h4> <a class="text-danger " style="font-weight: bold;" href="{{ route('home') }}">>> Tiếp tục mua hàng</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--coupon code area end-->

    </form>
</div>
<!--shopping cart area end -->
@endsection