<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@if(session('success'))
    <div class="alert alert-success" id="alert-tb">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" id="alert-tb">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <div class="col-md-6 offset-md-3 mt-4 p-4 bg-light rounded shadow-sm">
        <form action="{{ route('addOrder') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Khách Hàng:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="buy_date">Ngày:</label>
                <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{ old('buy_date') }}">
                @error('buy_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Trạng Thái:</label>
                <select class="form-control" id="status" name="status">
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Chưa xác nhận</option>
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Đã Xác nhận</option>
                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Đã hủy</option>
                    <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Đang vận chuyển</option>
                    <option value="4" {{ old('status') == 4 ? 'selected' : '' }}>Đã thanh toán</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Thêm Đơn Hàng</button>
        </form>
    </div>
</div>
