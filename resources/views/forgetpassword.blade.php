@extends('layout')
@section('tilte', 'Trang chủ')

@section('content')
<!-- customer login start -->
@if(session('message'))
    <div class="alert alert-warning" id="success-alert">{{ session('message') }}</div>
@endif
<div class="customer_login">
    <div class="row justify-content-center">
        <!--login area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>Lấy lại mật khẩu</h2>
                <form action="{{ route('forget.password') }}" method="post">
                    @csrf
                    <p>
                        <label>Email <span>*</span></label>
                        <input type="email" name="email">
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
