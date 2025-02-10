<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/danhsachsp.css">
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <li style=" display: inline-flex; margin-right: 15px;font-size: 18px;  "><a href="./admin.php" style="color: #007bff; text-decoration: none;font-weight: bold; "> Trang chủ</a></li>
            <section class="content-header">
                <h1>Danh sách sản phẩm</h1>
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
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>Không có sản phẩm nào.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="page-nav">
        <?php 
            include("phantrang_danhsach.php");
        ?>    
    </div>
</body>
</html>







