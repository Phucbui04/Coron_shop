@extends('admin.layout')
@section('title', 'Quản lý Đơn hàng')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .order-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-details h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .order-details p {
            margin-bottom: 5px;
        }

        .product-list {
            margin-top: 20px;
        }

        .product-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .product-name {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ route('updateStatus',['id'=>$order->id]) }}" method="post">
            @csrf
            <select name="status" id="">
                @if($order->status == 2)   
                <option value="2" selected>Hủy</option>
                <option value="3">Đang vận chuyển</option>
                <option value="4">Đã thanh toán</option>
                @elseif($order->status == 3)
                <option value="2">Hủy</option>
                <option value="3" selected>Đang vận chuyển</option>
                <option value="4">Đã thanh toán</option>
                @elseif($order->status == 4)
                <option value="2">Hủy</option>
                <option value="3">Đang vận chuyển</option>
                <option value="4" selected>Đã thanh toán</option>
                @endif
            </select>
            <button type="submit">Thay đổi</button>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="order-details">
                        <h2>Chi tiết sản phẩm đã đặt</h2>
                        <p><strong>Tên:</strong> {{ $order->name }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                        <p><strong>Ngày mua:</strong> {{ $order->created_at }}</p>
                        @if($order->status == 0 )
                        <p><strong>Trạng thái:</strong> Chưa xác nhận</p>
                        @elseif($order->status == 1)
                        <p><strong>Trạng thái:</strong> Đã xác nhận</p>
                        @elseif($order->status == 2)
                        <p><strong>Trạng thái:</strong>Đã hủy</p>
                        @elseif($order->status == 3)
                        <p><strong>Trạng thái:</strong> Đang giao hàng</p>
                        @elseif($order->status == 4)
                        <p><strong>Trạng thái:</strong> Đã thanh toán</p>
                        @endif
                        <p><strong>Người dùng:</strong> {{ $order->user->username }}</p>
                        <div class="product-list">
                            <h3>Danh sách sản phẩm</h3>
                            @foreach($orderdetail as $detail)
                            <div class="product-item">
                                <p class="product-name">{{ $detail->product->name }}</p>
                                <p>Hình ảnh</p>
                                <img src="{{ asset('uploads/'.$detail->product->image) }}" alt="" width="100px">
                                <p>Giá: {{ $detail->price }}</p>
                                <p>Số lượng: {{ $detail->quantity }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>

@endsection