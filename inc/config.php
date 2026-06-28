<?php
// 1. Tự động kiểm tra: Nếu có biến môi trường của Render/Railway thì dùng, không thì dùng local
if (getenv('DB_HOST')) {
    $db_host = getenv('DB_HOST');
    $db_user = getenv('DB_USER');
    $db_pass = getenv('DB_PASSWORD');
    $db_name = getenv('DB_NAME');
    $db_port = getenv('DB_PORT');
} elseif (isset($_ENV['DB_HOST'])) {
    $db_host = $_ENV['DB_HOST'];
    $db_user = $_ENV['DB_USER'];
    $db_pass = $_ENV['DB_PASSWORD'];
    $db_name = $_ENV['DB_NAME'];
    $db_port = $_ENV['DB_PORT'];
} else {
    // Cấu hình cứng trực tiếp thông số Railway của bạn để ÉP hệ thống kết nối thẳng
    $db_host = 'viaduct.proxy.rlwy.net';
    $db_user = 'root';
    $db_pass = 'LsGwcFSRVjZiWZebxyAZuKvWeITYQLzE'; 
    $db_name = 'railway';
    $db_port = 21925; // Số port public trên hình của bạn
}

// 2. Bật báo lỗi chuẩn cho MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // 3. Kết nối Database
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Lỗi kết nối Database rồi: " . $e->getMessage());
}

// 4. Biến base_url tự động định tuyến đường dẫn
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
?>