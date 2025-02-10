<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="css/quanlysanpham.css">
</head>
<body>
<div class="container"> 
    <div class="content-wrapper">
    <li style=" display: inline-flex; margin-right: 15px;font-size: 18px;  "><a href="./admin.php" style="color: #007bff; text-decoration: none;font-weight: bold; "> Trang chủ</a></li>
        <section class="content-header">
            <h1>Quản lý Danh Mục</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Kết nối cơ sở dữ liệu
                                    require '../inc/myconnect.php';

                                    // Truy vấn để lấy tất cả dữ liệu từ bảng phanloai
                                    $result = mysqli_query($mysqli, "SELECT * FROM phanloai");

                                    // Kiểm tra và hiển thị dữ liệu
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ID']; ?></td>
                                                <td><?php echo $row['Ten']; ?></td>
                                                <td>
                                                    <a class="btn btn-primary_1" href="suadanhmuc.php?id=<?php echo $row['ID']; ?>">
                                                        <i class="fa fa-edit fa-lg" title="Chỉnh sửa"></i> Chỉnh sửa
                                                    </a>
                                                    <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không?');" href="xoadanhmuc.php?id=<?php echo $row['ID']; ?>">
                                                        <i class="fa fa-trash-o fa-lg" title="Xóa"></i> Xóa
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>Không có danh mục nào.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div style="text-align:left; margin-top: 20px;">
                                <a class="btn btn-primary" href="themdanhmuc.php">Thêm Danh Mục</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
