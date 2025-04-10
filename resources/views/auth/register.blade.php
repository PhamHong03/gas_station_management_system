<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký - Hệ thống Quản lý Cây Xăng</title>
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

        .register-wrapper {
            width: 100%;
            max-width: 500px;
            padding: 0;
            margin: 20px;
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

        .btn-register {
            height: 48px;
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
            background-color: var(--dark-color);
            border: none;
            color: white;
            transition: all 0.3s;
        }

        .btn-register:hover {
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
        
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        
        .row-cols-2 > .col {
            padding: 0 10px;
        }
        
        .row-cols-2 > .col:first-child {
            padding-left: 0;
        }
        
        .row-cols-2 > .col:last-child {
            padding-right: 0;
        }

        @media (max-width: 576px) {
            .register-wrapper {
                margin: 10px;
            }
            
            .auth-body {
                padding: 20px;
            }
            
            .row-cols-2 {
                flex-direction: column;
            }
            
            .row-cols-2 > .col {
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="register-wrapper">
        <div class="auth-container">
            <div class="auth-header">
                <div class="brand-logo">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <h1>Đăng ký tài khoản</h1>
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
                        <label for="name">Họ và tên</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nhập họ và tên của bạn" value="{{ old('name') }}" required>
                            <span class="input-icon">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="CCCD">CCCD/CMND</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('CCCD') is-invalid @enderror" id="CCCD" name="CCCD" placeholder="Nhập số CCCD/CMND" value="{{ old('CCCD') }}" required>
                            <span class="input-icon">
                                <i class="fas fa-id-card"></i>
                            </span>
                        </div>
                        @error('CCCD')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu" required>
                                    <span class="input-icon toggle-password" style="cursor: pointer">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password_confirmation">Xác nhận mật khẩu</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                                    <span class="input-icon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="role" value="0">
                    <input type="hidden" name="active" value="1">

                    <button type="submit" class="btn btn-register w-100">
                        <i class="fas fa-user-plus me-2"></i> Đăng ký
                    </button>
                </form>

                <div class="form-footer">
                    <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordField = document.querySelector('#password');
            
            if (togglePassword && passwordField) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);
                    
                    this.querySelector('i').classList.toggle('fa-lock');
                    this.querySelector('i').classList.toggle('fa-lock-open');
                });
            }
        });
    </script>
</body>

</html>