# ⛽ VỊ TRÍ CÂY XĂNG TRÊN ĐỊA BÀN THÀNH PHỐ CẦN THƠ

> Laravel 10 | PHP 8.1+ | MySQL (XAMPP) | Composer | VSCode

Dự án giúp quản lý và hiển thị vị trí các cây xăng tại **TP. Cần Thơ**

---

## 🔧 YÊU CẦU HỆ THỐNG

- PHP >= 8.1
- Composer
- MySQL (qua XAMPP)
- Laravel 10.x
- Git
- VSCode (khuyên dùng)
---

## 🚀 CÀI ĐẶT & CHẠY DỰ ÁN

### 1. Clone dự án & cài thư viện
```bash
git clone https://github.com/PhamHong03/gas_station_management_system.git
cd gas_station_management_system

# Tạo file môi trường
cp .env.example .env       # macOS/Linux
# Hoặc
copy .env.example .env     # Windows

# Cài thư viện
composer install

### 2. Cấu hình kết nối CSDL trong file `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gas_station1(1)
DB_USERNAME=root
DB_PASSWORD=

---

## 🛠️ KHÔI PHỤC CƠ SỞ DỮ LIỆU

1. Truy cập [http://localhost/phpmyadmin](http://localhost/phpmyadmin)  
2. Tạo CSDL tên: `gas_stations)`  
3. Import file `gas_station1(1).sql` trong thư mục dự án
---

## 🔑 KHỞI TẠO & DỌN DẸP CACHE

```bash
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan route:clear
composer dump-autoload
---

## ▶️ CHẠY DỰ ÁN
```bash
php artisan serve

---

## 🧯 FIX LỖI 500 (Internal Server Error)
```bash
composer install
php artisan config:clear
php artisan cache:clear
php artisan route:clear
composer dump-autoload
php artisan key:generate
php artisan serve
---

## 📁 CẤU TRÚC DỰ ÁN

├── app/                 # Controllers, Models
├── database/            # Migrations, Seeds
├── public/              # Public folder, index.php
├── resources/views/     # Giao diện Blade
├── routes/web.php       # Web routes
├── .env                 # Môi trường
├── composer.json        # Thư viện
---

## Cách pull dữ liệu từ nhánh bạn
# 1. Kiểm tra nhánh hiện tại
git branch
git status

# 2. Chuyển sang nhánh của bạn khác (ví dụ: nhanhb)
git checkout nhanhb

# 3. Kéo dữ liệu mới nhất từ nhánh đó (sử dụng rebase cho lịch sử gọn)
git pull --rebase

# 4. Quay lại nhánh của bạn (ví dụ: main)
git checkout main

# 5. Gộp code từ nhánh bạn vào nhánh hiện tại
git merge nhanhb

## Xử lý conflic nếu có... 



