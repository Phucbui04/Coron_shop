@extends('layout')
@section('tilte', 'Trang chủ')

@section('content')
<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <div class="col-lg-3 col-md-8 col-12">
            <!--sidebar banner-->
            <div class="sidebar_widget banner mb-35">
                <div class="banner_img mb-35">
                    <a href="#"><img src="assets/img/banner/gioithieu.png" alt=""></a>
                </div>
                <div class="banner_img">
                    <a href="#"><img src="assets\img\banner\XUHUONG.png" alt=""></a>
                </div>
            </div>
            <!--sidebar banner end-->

            <!-- categorie menu start-->
            <div class="sidebar_widget catrgorie mb-35">
                <h3>Danh mục</h3>
                <ul>
                    <li class="has-sub"><a href="#">Nữ</a>
                        <!-- <ul class="categorie_sub">
                            <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                        </ul> -->
                    </li>
                    <li class="has-sub"><a href="#"> Nam</a>
                        <ul class="categorie_sub">
                            <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                        </ul>
                    </li>
                    <li class="has-sub"><a href="#"> Giày dép</a>
                        <!-- <ul class="categorie_sub">
                            <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                        </ul> -->

                    </li>
                    <li class="has-sub"><a href="#">Trang sức</a>
                        <ul class="categorie_sub">
                            <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                        </ul>
                    </li>
                    <!-- <li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i> Lady</a>
                        <ul class="categorie_sub">
                            <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                        </ul>
                    </li> -->

                </ul>
            </div>
            <!--categorie menu end -->

            <!--wishlist block start-->
            <div class="sidebar_widget wishlist mb-35">
                <div class="block_title">
                    <h3><a href="#">Danh sách</a></h3>
                </div>
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="#"><img src="assets\img\cart\cart.jpg" alt=""></a>
                    </div>
                    <div class="cart_info">
                        <a href="#">Áo mới cà mau</a>
                        <span class="cart_price">$115.00</span>
                        <span class="quantity">Qty: 1</span>
                    </div>
                    <div class="cart_remove">
                        <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="#"><img src="assets\img\cart\cart2.jpg" alt=""></a>
                    </div>
                    <div class="cart_info">
                        <a href="#">Áo bà ba</a>
                        <span class="cart_price">$105.00</span>
                        <span class="quantity">Qty: 1</span>
                    </div>
                    <div class="cart_remove">
                        <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                    </div>
                </div>
                <div class="block_content">
                    <p>2 sản phẩm</p>
                    <a href="#">» Danh sách của tôi</a>
                </div>
            </div>
            <!--wishlist block end-->

            <!--popular tags area-->
            <div class="sidebar_widget tags mb-35">
                <div class="block_title">
                    <h3>Tags phổ biến</h3>
                </div>
                <div class="block_tags">
                    <a href="#">áo mới</a>
                    <a href="#">thời trang</a>
                    <a href="#">quần âu</a>
                    <a href="#">Giày dép</a>
                    <a href="#">Áo khoác</a>
                    <a href="#">Áo polo</a>
                    <a href="#">Nano</a>
                    <a href="#">Levents</a>
                    <a href="#">Heyyou</a>
                </div>
            </div>
            <!--popular tags end-->

            <!--newsletter block start-->
            <div class="sidebar_widget newsletter mb-35">
                <div class="block_title">
                    <h3>Bảng Tin</h3>
                </div>
                <form action="#">
                    <p>Đăng ký nhận bảng tin của bạn</p>
                    <input placeholder="Địa chỉ email" type="text">
                    <button type="submit">Đăng ký</button>
                </form>
            </div>
            <!--newsletter block end-->

            <!--sidebar banner-->
            <!-- <div class="sidebar_widget bottom ">
                <div class="banner_img">
                    <a href="#"><img src="assets\img\banner\banner9.jpg" alt=""></a>
                </div>
            </div> -->
            <!--sidebar banner end-->



        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            <div class="banner_slider slider_1">
                <div class="slider_active owl-carousel">
                    <div class="single_slider" style="background-image: url(assets/img/banner/banner2.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>Thời trang Nam</h1>
                                <p>Phong cách thời trang là của bạn </p>
                                <a href="#">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="single_slider" style="background-image: url(assets/img/banner/banner1.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>Bộ sưu tập mới</h1>
                                <p>Bộ sưu tập mùa hè </p>
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--banner slider start-->
        @if(session('success'))
            <div class="alert alert-success" class="success-alert">
                {{session('success')}}
            </div>
        @endif
            <!--new product area start-->
            <div class="new_product_area">
                <div class="block_title">
                    <h3>Sản phẩm mới</h3>
                </div>
                <div class="row">
                    <div class="product_active owl-carousel">
                        @foreach($allProducts as $item)
                        <form action="{{ route('addCart') }}" method="post">
                            @csrf
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="{{ route('productdetail', ['id' => $item->id]) }}"><img src="{{ asset('uploads/'.$item->image) }} " alt=""></a>
                                    <!-- <div class="img_icone">
                                        <img src="{{$item->image}}" alt="">
                                    </div> -->
                                    <div class="product_action">
                                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                                        <input type="hidden" min="0" max="100" name="quantity" value="1" type="number">
                                        <a href="#"><button type="submit" class="mybtn"> Add to cart</button></a> 
                                    </div>
                                </div>
                                <div class="product_content">
                                    <span class="product_price">{{ number_format($item->price,0,',','.') }} VND</span>
                                    <h3 class="product_title"><a href="{{ route('productdetail', ['id' => $item->id]) }}">{{$item->title}}</a></h3>
                                </div>
                                <div class="product_info">
                                    <ul>
                                        <!-- <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li> -->
                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--new product area start-->

            <!--featured product start-->
            <div class="featured_product">
                <div class="block_title">
                    <h3>Săp ra mắt</h3>
                </div>
                <div class="row">
                    <div class="product_active owl-carousel">
                        @foreach($allProducts as $item)
                        <form action="{{ route('addCart') }}" method="post">
                            @csrf
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="{{ route('productdetail', ['id' => $item->id]) }}"><img src="{{ asset('uploads/'.$item->image) }}" alt=""></a>
                                    <!-- <div class="hot_img">
                                        <img src="assets\img\cart\span-hot.png" alt="">
                                    </div> -->
                                    <div class="product_action">
                                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                                        <input type="hidden" min="0" max="100" name="quantity" value="1" type="number">
                                        <a href="#"><button type="submit" class="mybtn"> Add to cart</button></a> 
                                    </div>
                                </div>
                                <div class="product_content">
                                    <span class="product_price">{{ number_format($item->price, 0,',','.') }} VND</span>
                                    <h3 class="product_title"><a href="{{ route('productdetail', ['id' => $item->id]) }}">{{$item->title}}</a></h3>
                                </div>
                                <div class="product_info">
                                    <ul>
                                        <!-- <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li> -->
                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--featured product end-->

            <!--banner area start-->
            <div class="banner_area mb-60">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single_banner">
                            <a href="#"><img src="assets\img\banner\banner7.jpg" alt=""></a>
                            <div class="banner_title">
                                <p>Giảm giá lên đến <span> 40%</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_banner">
                            <a href="#"><img src="assets\img\banner\banner8.jpg" alt=""></a>
                            <div class="banner_title title_2">
                                <p>Giảm gía <span> 30%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--banner area end-->

            <!--brand logo strat-->
            <div class="brand_logo mb-60">
                <div class="block_title">
                    <h3>Brands</h3>
                </div>
                <div class="row">
                    <div class="brand_active owl-carousel">
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="assets\img\brand\brand1.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="assets\img\brand\brand2.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="assets\img\brand\brand3.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="assets\img\brand\brand4.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="assets\img\brand\brand5.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="assets\img\brand\brand6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--brand logo end-->
        </div>
    </div>
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection