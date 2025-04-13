# Sử dụng PHP image từ Docker Hub
FROM php:7.4-apache

# Cài đặt các extension PHP cần thiết
RUN docker-php-ext-install mysqli

# Sao chép mã nguồn vào thư mục gốc của Apache
COPY . /var/www/html/

# Mở cổng 80 cho HTTP
EXPOSE 80

# Chạy Apache trong foreground
CMD ["apache2-foreground"]
