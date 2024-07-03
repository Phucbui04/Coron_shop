@extends('layout')
@section('tilte', 'Thanh Toán')

@section('content')

<style>
    .container-all {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    .container1 {
        text-align: center;
    }

    .payment-success1 {
        background-color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .payment-success1 h2 {
        color: #4CAF50;
    }

    .payment-success1 p {
        margin: 10px 0;
    }

    .payment-success1 a {
        display: inline-block;
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .payment-success1 a:hover {
        background-color: #45a049;
    }
</style>

<body>
   <div class="container-all">
   <div class="container1">
        <div class="payment-success1">
            <h2>Thanh toán thành công!</h2>
            <p>Cảm ơn bạn đã ủng hộ shop!!.</p>
            <p>Đơn hàng của bạn đã được đặt mua thành công.</p>
            <a href="{{ route('home') }}">Trở về trang chủ</a>
        </div>
    </div>
   </div>
</body>


@endsection
