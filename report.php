<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/font/font-awesome-pro-v6-6.2.0/css/all.css" />
    <link rel="stylesheet" href="./css/main.css"/>
    <link rel="stylesheet" href="./css/user.css"/>
    <link rel="stylesheet" href="./css/Info.css"/>
    <link rel="stylesheet" href="Header/css/headertop.css" />
    <link rel="stylesheet" href="Header/css/headermiddle.css" />
    <link rel="stylesheet" href="Header/css/headerbottom.css" />
    <link rel="stylesheet" href="./Footer/css/footer.css" />
    <link rel="stylesheet" href="./MenuLeft/css/menuleft.css" />
</head>
    <?php 
        include("inc/myconnect.php");     // Kết nối cơ sở dữ liệu
        include("inc/truyvan.php");       // Các hàm truy vấn chung
        include("Header/header.php");     // Header của trang
        include("MenuLeft/menuleft.php");
    ?>

<?php
// Lấy username từ session hoặc URL
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (empty($username)) {
    echo "Vui lòng đăng nhập để chỉnh sửa thông tin.";
    exit;
}

// Truy xuất thông tin người dùng
$user_query = "SELECT id, fullname FROM user WHERE username = '$username'";
$user_result = mysqli_query($mysqli, $user_query);

if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user = mysqli_fetch_assoc($user_result);
    $id_user = $user['id'];
    $full_name = $user['fullname'];
} else {
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}

// Xử lý báo lỗi nếu có
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_error'])) {
    $error_message = mysqli_real_escape_string($mysqli, $_POST['error_message']);
    
    // Lưu báo lỗi vào cơ sở dữ liệu hoặc xử lý theo cách khác
    $insert_error_query = "INSERT INTO error_reports (user_id, message, created_at) VALUES ('$id_user', '$error_message', NOW())";
    
    if (mysqli_query($mysqli, $insert_error_query)) {
        echo "Báo lỗi của bạn đã được gửi thành công!";
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo Lỗi</title>
    <link rel="stylesheet" href="./css/report.css"/>
</head>
<body>
    <h1>Báo Lỗi</h1>
    <form action="" method="post" class="form1">
    <p><strong>Họ và tên:</strong> <?php echo $full_name; ?></p>
    <label for="error_message">Nội dung báo lỗi:</label><br>
   
    <textarea id="error_message" name="error_message" rows="4" cols="50" required></textarea><br>
    <input type="submit" name="submit_error" value="Gửi Báo Lỗi">
    </form>
</body>
</html>
