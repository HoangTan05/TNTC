<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Ưu tiên lấy từ Environment Variables
$db_host = getenv('DB_HOST') ?: 'reseau.proxy.rlwy.net';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: 'LsGWcFSRVjZiWZebxyAZuKvWeITYQLzE';
$db_name = getenv('DB_NAME') ?: 'railway';
$db_port = getenv('DB_PORT') ?: 21925;

try {
    $conn = new mysqli(
        $db_host,
        $db_user,
        $db_pass,
        $db_name,
        (int)$db_port
    );

    $conn->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    die("Lỗi kết nối Database: " . $e->getMessage());
}

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
    ? "https"
    : "http") . "://" . $_SERVER['HTTP_HOST'];
?>