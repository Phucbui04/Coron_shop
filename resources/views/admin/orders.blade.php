@extends('admin.layout')
@section('title', 'Quản lý Đơn hàng')
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
    <table class="table_form">
        <tr>
            <th class="thead">#</th>
            <th class="thead">Khách Hàng</th>
            <th class="thead">Phone</th>
            <th class="thead">Email</th>
            <th class="thead">Địa chỉ</th>
            <th class="thead order-k">Chi tiết</th>
            <th class="thead">Ngày</th>                        
            <th class="thead">Trạng Thái</th>
            <!-- <th class="thead">Phương Thức Thanh Toán</th> -->
            <th class="thead order-k">Hành Động</th>
        </tr>
        @foreach($orders as $item)
        <tr>
            <td class="tbody">{{ $item->id }}</td>
            <td class="tbody">{{ $item->name }}</td>
            <td class="tbody">{{ $item->phone }}</td>
            <td class="tbody">{{ $item->email }}</td>
            <td class="tbody">{{ $item->address }}</td>
            <td class="tbody order-k"><a href="{{ route('orderDetail',['id'=>$item->id]) }}" class="myA" > Xem</a></td>
            <td class="tbody">{{ $item->buy_date }}</td>
            @if($item->status == 0 )
            <td class="tbody text-warning">Chưa xác nhận</td>
            @elseif($item->status == 1)
            <td class="tbody text-success">Đã Xác nhận</td>
            @elseif($item->status == 2)
            <td class="tbody text-danger">Đã hủy</td>
            @elseif($item->status == 3)
            <td class="tbody text-primary">Đang vận chuyển</td>
            @elseif($item->status == 4)
            <td class="tbody text-success">Đã thanh toán</td>
            @endif
            <!-- <td class="tbody">Tiền mặt</td> -->
            <td class="tbody order-k"><a href="{{ route('order.del',['id' => $item->id]) }}" class="myDel"> Xóa</a></td> <!--disabled-->
        </tr>
        @endforeach
    </table>
    <div class="clearfix"></div>
</div>

@endsection