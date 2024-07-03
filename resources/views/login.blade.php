@extends('layout')
@section('tilte', 'Trang chủ')

@section('content')
<!-- customer login start -->
@if(session('message'))
    <div class="alert alert-success" id="success-alert">{{ session('message') }}</div>
@endif
<div class="customer_login">
    <div class="row">
        <!--login area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>Đăng nhập</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <p>
                        <label>Tên đăng nhập <span>*</span></label>
                        <input type="text" name="username">
                    </p>
                    <p>
                        <label>Mật khẩu <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Đăng nhập</button>
                        <label for="remember">
                            <input id="remember" type="checkbox">Nhớ mật khẩu
                        </label>
                        <a href="{{ route('forget.password.form') }}">Bạn quên mật khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
        <!--login area start-->

        <!--register area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form register">
                <h2>Đăng ký</h2>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <p>
                        <label>Username <span>*</span></label>
                        <input type="text" name="username" >
                    </p>
                    <p>
                        <label>Địa chỉ email <span>*</span></label>
                        <input type="text" name="email">
                    </p>
                    <p>
                        <label>Mật khẩu <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <p>
                        <label>Xác nhận mật khẩu <span>*</span></label>
                        <input type="password" name="password_confirm">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>
</div>

<!-- customer login end -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            alert("{{ session('success') }}");
            {{ session()->forget('success') }} // Xóa thông báo khỏi session
        @endif

        @if($errors->any())
            var errors = "";
            @foreach($errors->all() as $error)
                errors += "{{ $error }}\n";
            @endforeach
            alert(errors);
        @endif
    });
</script>
@endsection
