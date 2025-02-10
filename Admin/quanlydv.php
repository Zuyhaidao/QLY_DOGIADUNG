
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Báo cáo lỗi</title>
    <link rel="stylesheet" href="./css/quanlydv.css">
</head>
<body>
    <?php 
        include("../inc/myconnect.php"); // Kết nối cơ sở dữ liệu
        // Truy vấn dữ liệu từ bảng error_reports
        $query = "SELECT `id`, `user_id`, `message`, `created_at` FROM error_reports";
        $result = mysqli_query($mysqli, $query);

        // Kiểm tra truy vấn có thành công không
        if (!$result) {
            echo "Có lỗi trong việc truy vấn dữ liệu: " . mysqli_error($mysqli);
            exit;
        }
    ?>

    <div class="content-wrapper">
    <li style=" display: inline-flex; margin-right: 15px;font-size: 18px;" ><a href="./admin.php" style="color: #007bff; text-decoration: none;font-weight: bold;"> Trang chủ</a></li>
        <div class="box">
            <div class="box-header">
                <h2>Báo cáo lỗi</h2>
            </div>
            <div class="box-body">
                <table class="table table-bordered" style="text-align: center;"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID User</th>
                            <th>Nội dung lỗi</th>
                            <th>Thời gian báo cáo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Lặp qua kết quả và hiển thị trong bảng
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <div class="page-nav">
        <?php 
            include("phantrang.php");
        ?>    
    </div> -->
</body>
</html>
