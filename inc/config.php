<?php
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
    // THÔNG SỐ PUBLIC (Dùng cho Render và Navicat kết nối từ ngoài vào)
    $db_host = 'viaduct.proxy.rlwy.net'; // Dùng viaduct thay vì reseau
    $db_user = 'root';
    $db_pass = 'LsGwcFSRVjZiWZebxyAZuKvWeITYQLzE'; 
    $db_name = 'railway';
    $db_port = 14125; // Cổng công khai chuẩn từ ảnh đầu tiên của bạn
}

// Bật báo lỗi chuẩn cho MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Lỗi kết nối Database rồi: " . $e->getMessage());
}

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
?>