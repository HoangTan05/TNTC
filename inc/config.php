<?php
// // Cấu hình đường dẫn gốc (dùng cho liên kết trong header/footer)
// $base_url = "/MBTIVerse";
// //Cấu hình kết nối database
// $db_host = "localhost";     // Server CSDL (thường là localhost)
// $db_user = "root";          // Tên người dùng (XAMPP thường là root)
// $db_pass = "";              // Mật khẩu (XAMPP thường để trống)
// $db_name = "mbti_schema";       // Tên database bạn đã tạo
// //Kết nối đến MySQL
// $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
// //Kiểm tra kết nối
// if ($conn->connect_error) {
//     die("Kết nối thất bại: " . $conn->connect_error);
// }


// Đọc thông số cấu hình từ Biến môi trường trên Render, nếu không có thì tự lấy local (để bạn vẫn code được ở máy)
$db_host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'localhost';
$db_user = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : 'root';
$db_pass = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : ''; // Mật khẩu local của bạn
$db_name = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : 'mbti_schema';
$db_port = isset($_ENV['DB_PORT']) ? $_ENV['DB_PORT'] : 3306;

// Kết nối Database kèm theo tham số Cổng (Port) - Rất quan trọng với Railway
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
