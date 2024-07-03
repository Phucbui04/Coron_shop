@extends('layout')
@section('tilte', 'Thiết lập mật khẩu')

@section('content')
<!-- customer login start -->
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="customer_login">
    <div class="row justify-content-center">
        <!--login area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>Tạo mật khẩu mới</h2>
                <form action="{{ route('reset.password') }}" method="post">
                    @csrf
                    <p>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <label>Email <span>*</span></label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label>Mật khẩu mới<span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <p>
                        <label>Nhập lại mật khẩu<span>*</span></label>
                        <input type="password" name="password_confirm">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <!--login area start-->
    </div>
</div>

<!-- customer login end -->
@endsection
