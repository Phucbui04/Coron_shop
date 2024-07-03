<style>
    .custom-form {
        max-width: 900px;
        margin: 10px auto;
        padding: 50px 68px 50px 50px;

        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .custom-span {
        display: block;
        margin-bottom: 5px;
        color: #495057;
    }

    .custom-input,
    .custom-textarea {
        width: 100%;
        padding: 8px;
        outline: none;
        margin-bottom: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .custom-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #0056b3;
    }

    .custom-span:last-child {
        float: right;
        cursor: pointer;
        color: #6c757d;
        font-size: 18px;
    }

    .custom-span:last-child:hover {
        color: #343a40;
    }

    .btn_inp {
        padding: 10px 20px;
        outline: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .soluong {
        width: 100px;
        height: 20px;
        margin-bottom: 20px;
    }
</style>
</head>

<body>
 
    <form class="custom-form" action="{{ route('product.update', ['id'=> $product->id] ) }}" method="post" enctype="multipart/form-data">
        @csrf
        <span class="custom-span">Tên sản phẩm</span>
        <input class="custom-input" type="text" name="title" value="<?= $product['title'] ?>"><br>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <label for="">Hình ảnh</label>
        <input type="file" name="image" class="input"><br>
        <img src="{{ asset('uploads/'.$product->image)}}" style="width:120px;" alt="">

        <span class="custom-span">Mô tả</span>
        <textarea class="custom-textarea" name="description" cols="30" rows="10">{{$product->description}}</textarea><br>

        <span class="custom-span">Chi tiết</span>
        <textarea class="custom-textarea" name="detail" cols="30" rows="10">{{$product->detail}}</textarea><br>

        <p for="" class="custom-span" >Giá</p>
        <input type="text" name="price" class="input" value="<?= $product['price'] ?>">

        <p for="" class="custom-span" >Sale</p>
        <input type="text" name="sale" class="input" value="<?= $product['sale'] ?>">

        <p for="" class="custom-span" >Status</p>
        <input type="text" name="status" class="input" value="<?= $product['status'] ?>">
        <!--         
        <label for="">Giảm giá</label>
        <input type="text" name="discount" class="input" value=""><br> -->

        <p class="custom-span">Danh mục</p>
        <select name="category_id" class="select">
            @foreach($categories as $item)
            @if($item->id == $product->category_id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
            @endforeach
        </select>
        <br><br>

        <input class="btn_inp" type="submit" value="Sửa Ngay">
    </form>