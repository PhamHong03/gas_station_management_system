<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/f59bcd8580.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .auth-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #1877f2;
        }

        .toggle-link {
            text-align: center;
            margin-top: 15px;
        }

        .toggle-link a {
            color: #1877f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="auth-container">

        <div class="auth-container">
            <div class="auth-header">
                <h1>Đăng Ký</h1>
                @include('admin.layouts.alert')
            </div>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="signup-email">Email</label>
                    <input type="email" class="form-control" id="signup-email" name="email" placeholder="Nhập email">
                    @error('email')
                    <div class="ms-5 text-danger">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="email">Họ và Tên</label>
                    <input type="name" class="form-control" id="text" name="name"
                        placeholder="Nhập họ và tên" >
                        @error('name')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">CCCD</label>
                    <input type="name" class="form-control" id="text1" name="CCCD"
                        placeholder="Nhập CCCD" >
                        @error('CCCD')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="signup-password">Mật khẩu</label>
                    <input type="password" class="form-control" id="signup-password-confirm"
                        name="password" placeholder="Nhập mật khẩu" >
                        @error('password')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="signup-password-confirm">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="signup-password-confirm"
                        name="password_confirmation" placeholder="Xác nhận mật khẩu" >
                        @error('password_confirmation')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <input type="hidden" class="form-control" name="role" value="0">
                <input type="hidden" class="form-control" name="active" value="1">
                <button type="submit" class="btn btn-dark w-100">Đăng ký</button>
            </form>

            <div class="form-footer">
                <p>Đã có tài khoản? <a href="{{ route('login') }}" >Đăng nhập</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('show-signup').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.auth-container').style.display = 'none';
            document.getElementById('signup-form').style.display = 'block';
        });

        document.getElementById('show-login').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('signup-form').style.display = 'none';
            document.querySelector('.auth-container').style.display = 'block';
        });
    </script>
</body>

</html>
