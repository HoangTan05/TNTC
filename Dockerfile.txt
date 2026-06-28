FROM php:8.2-apache

# Cài đặt extension mysqli và pdo_mysql để kết nối cơ sở dữ liệu ổn định
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Bật module rewrite của Apache để tránh lỗi đường dẫn 404
RUN a2enmod rewrite

# Copy toàn bộ code từ thư mục máy tính vào container
COPY . /var/www/html/

# Cấp quyền cho Apache đọc ghi dữ liệu
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80