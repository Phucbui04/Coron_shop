@extends('admin.layout')
@section('title', 'Quản lý danh mục')
@section('content')
<div class="container_table">
    @if (session('success'))
    <div class="alert alert-success" id="alert-tb">{{ session('success') }}</div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger" id="alert-tb">{{ session('error') }}</div>
    @endif

    <div class="addnew">
        <a class="addspnew" href="#">Thêm Danh Mục</a>
    </div>
    <table class="table_form">
        <tr>
            <th class="thead">#</th>
            <th class="thead">Tên Danh Mục</th>
            <th class="thead">Thao Tác</th>
        </tr>
        @foreach($categories as $item)
        <tr>
            <td class="tbody">{{$item->id}}</td>
            <td class="tbody">{{$item->name}}</td>
            <td class="tbody"><a href="{{ route('categories.del', ['id'=>$item->id]) }}"> Xóa</a> -
                <a href="{{ route('categories.edit', ['id' => $item->id ]) }}">Sửa</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="clearfix"></div>
</div>
<form action="{{ url('/categories/add')}}" class="forms" method="post">
    @csrf
    <h1 class="title">Thêm Danh Mục</h1>
    <label for="">Tên danh mục</label>
    <input type="text" name="name" placeholder="Nhập tên danh mục.." class="input"><br>
    <!-- <label for="">Vị trí</label>
                <input type="number" name="vitri" class="input">
                <label for="">Mô tả</label>
                <textarea name="mota" id="" cols="30" rows="10"></textarea> -->

    <button class="button">Thêm mới</button>
    <span class="close">X</span>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="layoutAdmin/js/main.js"></script>

<script>
    $(".nav").click(function() {
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

    $(".nav2").click(function() {
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