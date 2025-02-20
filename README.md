-Này là vì code thuần tôi không chắc nên tôi sài framework, mọi người có ý kiến cứ nói lên nha.
- Mọi người tạo mỗi người 1 nhánh đặt tên nhánh theo tên của mình nha, hiện tại chỉ mới có khung sườn chưa có nội dung gì nên mọi người chưa cần phải pull về đâu. 
- Mở extension VSC tải Git graph về trước nha
*Xử lý lỗi 500 error khi pull về:
- composer install
- mv .env.example .env
- php artisan cache:clear
- composer dump-autoload
- php artisan key:generate
- php artisan serve
