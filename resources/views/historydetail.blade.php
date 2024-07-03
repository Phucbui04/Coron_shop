@extends('layout')
@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Chi tiết đơn hàng</h2>
    <div class="order_details_area">
        <form action="#">
            <!-- Thông tin khách hàng -->
            <div class="customer_info mb-4 p-4 bg-light rounded">
                <h4 class="mb-3">Thông tin khách hàng</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Tên khách hàng:</strong> {{ $order->name }}</p>
                        <p><strong>Email:</strong> {{$order->email}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                        <p><strong>Địa chỉ: </strong>{{ $order->address }}</p>
                    </div>
                </div>
            </div>

            <!-- Thông tin đơn hàng -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    @php
                    $total = 0;
                    @endphp
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                      @php 
                        $total += $detail->product->price * $detail->quantity;
                      @endphp

                        <tr>
                            <td>{{ $order->id }}</td>
                            <td class="product_thumb"><a href="#"><img src="{{ asset('uploads/'.$detail->product->image) }}" alt="Product Image" class="img-fluid rounded" style="max-width: 100px;"></a></td>
                            <td>{{$detail->product->title}}</td>
                            <td>{{number_format($detail->product->price)}} VND</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($detail->product->price * $detail->quantity) }} VND</td>
                        </tr>
                        @endforeach
                        <!-- Thêm các hàng khác tương tự -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Tổng cộng:</strong></td>
                            <td>{{ number_format($total) }} VND</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection