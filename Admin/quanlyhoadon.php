<?php

include("../inc/myconnect.php"); 


$query = "
    SELECT donhang.ID, donhang.id_user, donhang.ngay_dat, donhang.tong_tien,
           chitiet_donhang.id_sanpham, chitiet_donhang.so_luong, chitiet_donhang.gia
    FROM donhang
    JOIN chitiet_donhang ON donhang.ID = chitiet_donhang.id_donhang
";
$result = mysqli_query($mysqli, $query);

// Kiểm tra truy vấn
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
    <title>Quản lý hóa đơn </title>
    <link rel="stylesheet" href="./css/quanlyhoadon.css">
</head>
<body>
    <div class="content-wrapper">
    <li style=" display: inline-flex; margin-right: 15px;font-size: 18px;" ><a href="./admin.php" style="color: #007bff; text-decoration: none;font-weight: bold;"> Trang chủ</a></li>
        <div class="box">
            <div class="box-header">
                <h2>Quản lý hóa đơn </h2>
            </div>
            <div class="box-body">
                <table class="table table-bordered" style= "text-align: center;">
                    <thead>
                        <tr>
                            <th>ID Đơn Hàng</th>
                            <th>ID Người Dùng</th>
                            <th>Ngày Đặt</th>
                            <th>Tổng Tiền</th>
                            <th>ID Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['id_user']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ngay_dat']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tong_tien']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['id_sanpham']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['so_luong']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gia']) . "</td>";
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
