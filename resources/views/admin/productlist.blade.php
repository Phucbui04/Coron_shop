@extends('admin.layout')
@section('title', 'Quản lý sản phẩm')
@section('content')
<div class="container_table">
    @if(session('sussecc'))
        <div class="alert alert-success" id="alert-tb">{{ session('sussecc') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" id="alert-tb">{{ session('error') }}</div>
    @endif
    <div class="addnew">
        <a class="addspnew" href="#">Thêm Sản Phẩm</a>
    </div>
    <table class="table_form">
        <tr>
            <th class="thead">#</th>
            <th class="thead">Tên sản phẩm</th>
            <th class="thead">Hình ảnh</th>
            <th class="thead">Danh mục</th>
            <th class="thead">Thao Tác</th>
        </tr>
        @foreach($products as $item)
        <tr>
            <td class="tbody">{{$item->id}}</td>
            <td class="tbody">{{$item->title}}</td>
            <td class="tbody"><img src="{{ asset('uploads/'.$item->image) }}" alt=""></td>
            <td class="tbody">
                @if($item->category)
                {{$item->category->name}}
                @else
                Không có danh mục
                @endif
            </td>
            <td class="tbody"><a href="{{ route('product.del',['id' =>$item->id]) }}"> Xóa</a> - 
            <a href="{{ route('product.updateForm',['id' =>$item->id]) }}">Sửa</a></td>
        </tr>
        @endforeach
    </table>
    <div class="clearfix"></div>
</div>
<form action="{{ route('product.add') }}" class="forms" method="post" enctype="multipart/form-data">
    @csrf
    <h1 class="title">Nhập sản phẩm</h1>
    <label for="">Tên sản phẩm</label>
    <input type="text" name="title" placeholder="Nhập tên sản phẩm.." class="input"><br>
    <label for="">Hình ảnh</label>
    <input type="file" name="image" class="input"><br>
    <label for="">Giá</label>
    <input type="text" name="price" placeholder="Nhập giá sản phẩm...." class="input"><br>
    <label for="">Danh mục</label>

    <select name="category_id" class="select">
        @foreach($categories as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select><br>

    <label for="">Mô tả</label>
    <textarea name="description" id="" rows="5" cols="20"></textarea>

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