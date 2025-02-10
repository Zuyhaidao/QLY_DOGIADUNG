<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="css/quanlysanpham.css">
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <li style=" display: inline-flex; margin-right: 15px;font-size: 18px;  "><a href="./admin.php" style="color: #007bff; text-decoration: none;font-weight: bold; "> Trang chủ</a></li>
            <section class="content-header">
                <h1>Quản lý sản phẩm </h1>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Hình ảnh</th>
                                            <th class="Hangsanxuat">Hãng sản xuất</th>
                                            <th>Mô tả</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                     
                                        require '../inc/myconnect.php';

                                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $limit = 12;
                                        $start = ($current_page - 1) * $limit;

                                        $result = mysqli_query($mysqli, "SELECT * FROM sanpham LIMIT $start, $limit");

                                      
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><a href="chitietsp.php?id=<?php echo $row['ID']; ?>" style="color:black; font-weight: bold; "><?php echo $row['Ten']; ?></a></td>
                                                    <td><?php echo number_format($row['Gia']); ?> VND</td>
                                                    <td><img src="../images/<?php echo $row['HinhAnh']; ?>" alt="<?php echo $row['Ten']; ?>"></td>
                                                    <td><?php echo $row['HSX']; ?></td>
                                                    <td><?php echo mb_strimwidth($row['Mota'], 0, 50, "..."); ?></td>
                                                    <td>
                                                        <a class="btn btn-primary_1" href="suasp.php?id=<?php echo $row['ID']; ?>">
                                                            <i class="fa fa-edit fa-lg" title="Chỉnh sửa"></i> Chỉnh sửa
                                                        </a>
                                                        <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không?');" href="xoasp.php?id=<?php echo $row['ID']; ?>">
                                                            <i class="fa fa-trash-o fa-lg" title="Xóa"></i> Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>Không có sản phẩm nào.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div style="text-align:left; margin-top: 20px;">
                                    <a class="btn btn-primary" href="themsanpham.php">Thêm Sản phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="page-nav">
        <?php 
            include("phantrang.php");
        ?>    
    </div>
</body>
</html>







