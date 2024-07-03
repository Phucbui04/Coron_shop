@extends('layout')
@section('tilte', 'My Acount')

@section('content')
<section class="main_content_area">
    <div class="account_dashboard">
        @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{session('success')}}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn hàng</a></li>
                        <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li>
                        <!-- <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li> -->
                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Tài Khoản</a></li>
                        <li><a href="{{ route('logout') }}" class="nav-link" id="logoutLink" onclick="return checkLogout()">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="dashboard">
                        <h3>Dashboard </h3>
                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h3>Đơn hàng</h3>
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>#</th>
                                        <th>Ngày mua</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        @if($order->status == 0)
                                        <td><span class="success text-warning">Chưa xác nhận</span></td>
                                        @elseif($order->status == 1)
                                        <td><span class="success text-success">Đã xác nhận</span></td>
                                        @elseif($order->status == 2)
                                        <td><span class="success text-danger">Đã hủy</span></td>
                                        @elseif($order->status == 3)
                                        <td><span class="success text-primary">Đang vận chuyển</span></td>
                                        @else
                                        <td><span class="success text-success">Đã Thanh toán</span></td>                                        
                                        @endif

                                        @php
                                        $totalPrice = 0;
                                        foreach ($order->orderDetails as $detail) {
                                        $totalPrice += $detail->product->price * $detail->quantity;
                                        }
                                        @endphp

                                        {{-- Hiển thị tổng giá trị --}}
                                        <td>{{ number_format($totalPrice) }} VND</td>

                                        <td><a href="{{ route('historyDetail',['id'=>$order->id]) }}" class="view">view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="downloads">
                        <h3>Downloads</h3>
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Downloads</th>
                                        <th>Expires</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shopnovilla - Free Real Estate PSD Template</td>
                                        <td>May 10, 2018</td>
                                        <td><span class="danger">Expired</span></td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                    </tr>
                                    <tr>
                                        <td>Organic - ecommerce html template</td>
                                        <td>Sep 11, 2018</td>
                                        <td>Never</td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="tab-pane" id="address">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <h4 class="billing-address">Billing address</h4>
                        <a href="#" class="view">Edit</a>
                        <p><strong>Bobby Jackson</strong></p>
                        <address>
                            House #15<br>
                            Road #1<br>
                            Block #C <br>
                            Banasree <br>
                            Dhaka <br>
                            1212
                        </address>
                        <p>Bangladesh</p>
                    </div> -->
                    <div class="tab-pane fade" id="account-details">
                        <h3>Tài khoản của bạn </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('updateUser') }}" method="post">
                                        @csrf

                                        <label>Họ và Tên</label>
                                        <input type="text" name="username" value="{{ $user->username }}">
                                        <!-- <label>Last Name</label>
                                        <input type="text" name="last-name"> -->
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ $user->email }}">
                                        <label>Mật khẩu mới</label>
                                        <input type="text" name="password" value="" placeholder="Nhập để thay đổi mật khẩu">
                                        <!-- <label>Birthdate</label>
                                        <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday"> -->
                                        <br>

                                        <div class="save_button primary_btn default_button">
                                            <button type="submit" class="mybtn">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection