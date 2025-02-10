<?php

include("../inc/myconnect.php"); 


$query = "
    SELECT user.id, user.fullname, donhang.tong_tien, donhang.ngay_dat
    FROM user
    JOIN donhang ON user.id = donhang.id_user
";
$result = mysqli_query($mysqli, $query);

if (!$result) {
    echo "Lỗi khi truy vấn dữ liệu: " . mysqli_error($mysqli);
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/font/font-awesome-pro-v6-6.2.0/css/all.css" />
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="./css/quanlykhachhang.css">
</head>
<body>
    <div class="content-wrapper">
    <li style=" display: inline-flex; margin-right: 15px;font-size: 18px;" ><a href="./admin.php" style="color: #007bff; text-decoration: none;font-weight: bold;"> Trang chủ</a></li>
        <div class="box">
            <div class="box-header">
                <h2>Danh sách khách hàng</h2>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Người Dùng</th>
                            <th>Họ Tên</th>
                            <th>Tổng Tiền</th>
                            <th>Ngày Đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tong_tien']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ngay_dat']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
