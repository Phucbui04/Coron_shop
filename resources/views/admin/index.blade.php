@extends('admin.layout')
<title>Admin</title>
@section('content')
<div class="col-div-3">
	<div class="box">
		<p>{{ $categories }}<br /><span>Danh Mục</span></p>
		<i class="fa fa-folder-open box-icon"></i>
	</div>
</div>
<div class="col-div-3">
	<div class="box">
		<p>{{ $products }}<br /><span>Sản Phẩm</span></p>
		<i class="fa fa-folder-plus box-icon"></i>
	</div>
</div>
<div class="col-div-3">
	<div class="box">
		<p>{{ $orders }}<br /><span>Đơn Hàng</span></p>
		<i class="fa fa-shopping-bag box-icon"></i>
	</div>
</div>
<div class="col-div-3">
	<div class="box">
		<div class="box-content">
			<span>Tổng Doanh Thu</span>
			<p class="price-p">{{ number_format($total_price) }}<span class="currency"> VND</span></p>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<br /><br />
<div class="col-div-8">
	<div class="box-8">
		<div class="content-box">
			<p>Sản Phẩm Bán Chạy <span>Tất cả</span></p>
			<br />
			<table>
				<tr>
					<th>Tên Sản Phẩm</th>
					<th>Hình Ảnh</th>
					<th>Giá</th>
				</tr>
				<tr>
					<td>Áo polo</td>
					<td class="topsp"><img src="layoutAdmin/images/topsp1.webp" alt=""></td>
					<td>$10</td>
				</tr>
				<tr>
					<td>Áo polo</td>
					<td class="topsp"><img src="layoutAdmin/images/topsp1.webp" alt=""></td>
					<td>$10</td>
				</tr>
				<tr>
					<td>Áo polo</td>
					<td class="topsp"><img src="layoutAdmin/images/topsp1.webp" alt=""></td>
					<td>$10</td>
				</tr>

			</table>
		</div>
	</div>
</div>

<div class="col-div-4">
	<div class="box-4">
		<div class="content-box">
			<p>Tổng Doanh Thu <span>Tất cả</span></p>

			<div class="circle-wrap">
				<div class="circle">
					<div class="mask full">
						<div class="fill"></div>
					</div>
					<div class="mask half">
						<div class="fill"></div>
					</div>
					<div class="inside-circle"> 70% </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>


</div>
@endsection