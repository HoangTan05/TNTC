<?php
// Kiểm tra nếu đang chạy trên Render (có biến DB_HOST) thì lấy thông số Railway
// Nếu không có (chạy dưới máy local) thì tự động dùng thông số XAMPP của bạn
if (isset($_ENV['DB_HOST']) || getenv('DB_HOST')) {
    $db_host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : getenv('DB_HOST');
    $db_user = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : getenv('DB_USER');
    $db_pass = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : getenv('DB_PASSWORD');
    $db_name = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : getenv('DB_NAME');
    $db_port = isset($_ENV['DB_PORT']) ? $_ENV['DB_PORT'] : getenv('DB_PORT');
} else {
    // Thông số chạy ở máy XAMPP local của bạn
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = ''; 
    $db_name = 'mbti_schema';
    $db_port = 3306;
}

// Bật chế độ báo lỗi MySQLi chuẩn
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Kết nối Database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
$conn->set_charset("utf8mb4");

// Biến base_url tự động nhận diện theo môi trường để không bị lỗi link
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
?>