<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thay đổi mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xác nhận đặt lại mật khẩu</h2>
        <p>Xin chào,</p>
        <p>Bạn (hoặc ai đó) đã yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Vui lòng nhấp vào liên kết bên dưới để tiếp tục quá trình đặt lại mật khẩu:</p>
        <p><a href="{{ route('reset.password.form', $token) }}" class="button" style="color:white;">Đặt lại mật khẩu</a></p>
        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua email này.</p>
        <p>Xin cảm ơn.</p>
    </div>
</body>
</html>
