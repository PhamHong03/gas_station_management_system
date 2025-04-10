<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Hệ thống Quản lý Cây Xăng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --dark-color: #212529;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 0;
        }

        .auth-container {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .auth-header {
            background-color: var(--dark-color);
            color: white;
            padding: 25px 40px;
            text-align: center;
            position: relative;
        }

        .auth-header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .brand-logo {
            margin-bottom: 15px;
            font-size: 40px;
            color: #fff;
        }

        .auth-body {
            padding: 30px 40px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark-color);
        }

        .form-control {
            height: 48px;
            border-radius: 8px;
            padding-left: 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
        }

        .input-icon {
            position: absolute;
            top: 43px;
            right: 15px;
            color: #6c757d;
        }

        .btn-login {
            height: 48px;
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
            background-color: var(--dark-color);
            border: none;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #000;
            transform: translateY(-1px);
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .remember-me {
            margin-bottom: 20px;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        
        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .forgot-password a {
            color: var(--secondary-color);
            font-size: 0.875rem;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="auth-container">
            <div class="auth-header">
                <div class="brand-logo">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <h1>Đăng nhập hệ thống</h1>
            </div>
            
            <div class="auth-body">
                @include('admin.layouts.alert')
                
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Nhập email của bạn" value="{{ old('email') }}" required>
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <div class="form-check remember-me">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="forgot-password">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login btn-dark w-100">
                        <i class="fas fa-sign-in-alt me-2"></i> Đăng nhập
                    </button>
                </form>

                <div class="form-footer">
                    <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>