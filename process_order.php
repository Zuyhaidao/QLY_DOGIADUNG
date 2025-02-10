<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/process_order.css"/>
    <title>Thanh toán thành công</title>
    <style>
        html{
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        body {
            background-image: url('./Images/Thankyou.jpg'); /* Đường dẫn tới ảnh */
            background-size: cover; /* Làm cho hình nền bao phủ toàn bộ */
            background-position: center; /* Căn giữa hình nền */
            background-repeat: no-repeat; /* Không lặp lại hình nền */
            height: 100vh; /* Đặt chiều cao của body bằng 100% chiều cao viewport */
            margin: 0; /* Xóa margin mặc định */
        }
        /* Link quay lại trang chủ */
        .back-home-link {
            position: absolute;
            top: 20px;
            margin-left: 20px;
            text-decoration: none;
            font-size: 1em;
            color: #333;
            background-color: #e7e7e7;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-home-link:hover {
            background-color: #d4d4d4;
        }
    </style>
</head>

<body>
    <!-- Link quay lại trang chủ -->
    <a href="index.php" class="back-home-link">Quay lại trang chủ</a>
</body>
</html>
