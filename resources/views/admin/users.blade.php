@extends('admin.layout')
@section('title', 'Quản lý người dùng')
@section('content')

@if(session('success'))
    <div class="alert alert-success" id="alert-tb">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" id="alert-tb">
        {{session('error')}}
    </div>
@endif
<div class="container_table">
    <div class="addnew">
        <a class="addspnew" href="#">Thêm Thành viên</a>
    </div>
    <table class="table_form">
        <tr>
            <th class="thead">#</th>
            <th class="thead">Tên đăng nhập</th>
            <th class="thead">Email</th>
            <th class="thead">Thao Tác</th>
        </tr>
        @foreach($users as $item)
        <tr>
            <td class="tbody">{{$item->id}}</td>
            <td class="tbody">{{$item->username}}</td>
            <td class="tbody">{{$item->email}}</td>
            <td class="tbody"><a href="{{ route('del.user',['id'=>$item->id]) }}"> Xóa</a> - 
            <a href="{{ route('update.user',['id'=>$item->id]) }}">Sửa</a></td>
        </tr>
        @endforeach
    </table>
    <div class="clearfix"></div>
</div>
<form action="{{ route('add.user') }}" class="forms" method="post">
    @csrf
    <h1 class="title">Nhập Thành Viên</h1>
    <label for="">Tên đăng nhập</label>
    <input type="text" name="username" placeholder="Nhập tên đăng nhập.." class="input"><br>
    <label for="">Mật khẩu</label>
    <input type="password" name="password" placeholder="Nhập mật khẩu.." class="input"><br>
    
    <label for="">Phân quyền</label>
    <select name="role" id="" class="input">        
        <option value="">Tùy Chọn</option>
        <option value="0">Người dùng</option>
        <option value="1">Admin</option>
    </select> <br>
    <label for="">Email</label>
    <input type="email" name="email" placeholder="Nhập email.." class="input"><br>
    <button class="button" type="submit">Thêm mới</button>
    <span class="close">X</span>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="layoutAdmin/js/main.js"></script>

<script>

    $(".nav").click(function () {
        $("#mySidenav").css('width', '70px');
        $("#main").css('margin-left', '70px');
        $(".logo").css('visibility', 'hidden');
        $(".logo span").css('visibility', 'visible');
        $(".logo span").css('margin-left', '-10px');
        $(".icon-a").css('visibility', 'hidden');
        $(".icons").css('visibility', 'visible');
        $(".icons").css('margin-left', '-8px');
        $(".nav").css('display', 'none');
        $(".nav2").css('display', 'block');
    });

    $(".nav2").click(function () {
        $("#mySidenav").css('width', '300px');
        $("#main").css('margin-left', '300px');
        $(".logo").css('visibility', 'visible');
        $(".icon-a").css('visibility', 'visible');
        $(".icons").css('visibility', 'visible');
        $(".nav").css('display', 'block');
        $(".nav2").css('display', 'none');
    });
</script>
@endsection