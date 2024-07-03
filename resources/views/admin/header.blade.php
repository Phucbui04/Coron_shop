
<body>

<div id="mySidenav" class="sidenav">
    <p class="logo"><span>A</span>dmin</p>
    <a href="{{route('admin')}}" class="icon-a"><i class="fa fa-dashboard icons"></i> <span>Bảng Điều Khiển</span> </a>
    <a href="{{route('categories')}}" class="icon-a"><i class="fa fa-folder-open icons"></i> <span>Quản Lý Danh Mục</span></a>
    <a href="{{route('productlist')}}" class="icon-a"><i class="fa fa-folder-plus icons"></i> <span>Quản Lý Sản Phẩm</span></a>
    <a href="{{ route('order') }}" class="icon-a"><i class="fa fa-shopping-bag icons"></i> <span>Quản Lý Đơn hàng</span></a>
    <a href="{{ route('users') }}" class="icon-a"><i class="fa fa-user icons"></i> <span>Quản Lý Thành Viên</span></a>
    <p class="logout"><a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> <span>Đăng Xuất</span></a></p>
</div>
<div id="main">
    <div class="head">
        <div class="col-div-6">
            <span style="font-size:30px;cursor:pointer; color: #342E37;" class="nav">☰ Bảng Điều Khiển</span>
            <span style="font-size:30px;cursor:pointer; color: #342E37;" class="nav2">☰ Bảng Điều Khiển</span>
        </div>

        <div class="col-div-6">
            <div class="profile">

                <img src="{{ asset('layoutAdmin/images/user.png') }}" class="pro-img" />
                <p>Admin </p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
    <br />