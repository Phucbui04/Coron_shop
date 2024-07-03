<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
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
    </style>
</head>
<body>
    <form class="custom-form" action="{{ route('update.user',['id'=>$user->id]) }}" method="post">
        @csrf
        <span class="custom-span">Tên người dùng</span>
        <input class="custom-input" type="text" name="username" value="{{$user->username}}"><br>

        <span class="custom-span">Email</span>
        <input class="custom-input" type="email" name="email" value="{{$user->email}}"><br>

        <span class="custom-span">Mật khẩu</span>
        <input class="custom-input" type="password" name="password" value="{{$user->password}}"><br>

        <span class="custom-span">Role</span>
        <select name="role" id="" class="custom-input">
            @if($user->role == 1)
            <option value="1" selected>Admin</option>
            <option value="0">Người dùng</option>
            @elseif($user->role == 0)
            <option value="0" selected>Người dùng</option>
            <option value="1">Admin</option>
            @endif
        </select>

        <input class="btn_inp" type="submit" value="Cập nhật">
    </form>
</body>
</html>
