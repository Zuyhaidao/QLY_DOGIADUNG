<link rel="stylesheet" href="./css/cart.css"/>
<link rel="stylesheet" href="./Footer/css/footer.css"/>
<link rel="stylesheet" href="./MenuLeft/css/menuleft.css" />
<?php
ob_start();
session_start(); // Đảm bảo khởi động session trước khi sử dụng
require "inc/myconnect.php"; // Kết nối cơ sở dữ liệu
include("MenuLeft/menuleft.php");

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header('Location: index.php'); // Chuyển hướng nếu giỏ hàng rỗng
    exit();
}

// Xử lý cập nhật số lượng sản phẩm
if (isset($_POST['update_qty'])) {
    $productId = $_POST['idsp'];
    $new_qty = intval($_POST['qty'][$productId]);
    
    if ($new_qty >= 1 && $new_qty <= 99) {
        $_SESSION['cart'][$productId] = $new_qty;
    }
}

// Xử lý xóa sản phẩm
if (isset($_POST['remove'])) {
    $productId = $_POST['idsp'];
    unset($_SESSION['cart'][$productId]); // Xóa sản phẩm khỏi giỏ hàng
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        header('Location: index.php'); // Chuyển hướng nếu giỏ hàng rỗng
        exit();
    }
}

// Xử lý xóa hết giỏ hàng
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']); // Xóa hết giỏ hàng
    header('Location: index.php'); 
    exit();
}

?>
<body>
<title>Giỏ hàng</title>
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="cart">
            <p>
                <?php
                if (isset($_SESSION['cart'])) {
                    echo "Có " . count($_SESSION['cart']) . " sản phẩm trong giỏ hàng ";
                } else {
                    echo "<p>Không có sản phẩm nào trong giỏ hàng</p>";
                }

                $sl = count($_SESSION['cart']);
                ?>
            </p>            
        </div>

        <?php
        if (isset($_SESSION['cart'])) {
            $item = array_keys($_SESSION['cart']); // Lấy danh sách ID sản phẩm
            $str = implode(",", $item);

            // Kiểm tra nếu $str rỗng
            if (!empty($str)) {
                $query = "SELECT s.ID, s.Ten, s.Gia, s.HinhAnh, s.HSX, s.Mota, n.Ten as Tennhasx, s.idphanloai 
                          FROM sanpham s 
                          LEFT JOIN phanloai n ON n.ID = s.idphanloai
                          WHERE s.ID IN ($str)";

                // Thực thi truy vấn và kiểm tra lỗi
                $result = $mysqli->query($query);

                if ($result === false) {
                    // Hiển thị thông báo lỗi nếu truy vấn SQL có vấn đề
                    echo "Lỗi truy vấn: " . $mysqli->error;
                } else {
                    // Chỉ xử lý nếu có kết quả hợp lệ
                    $total = 0; // Khởi tạo $total

                    // Kiểm tra xem kết quả truy vấn có dòng nào không
                    if ($result->num_rows > 0) {
                        // Duyệt qua từng sản phẩm trong giỏ hàng
                        foreach ($result as $s) {
        ?>

                        <div class="row">
                            <form name="form5" id="ff5" method="POST" action="cart.php">
                                <div class="product well">
                                    <div class="col-md-3">
                                        <div class="image">
                                            <img src="Images/<?php echo $s["HinhAnh"] ?>" style="width:300px;height:300px" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="caption">
                                            <div class="name"><h3><a href="product.php?id=<?php echo $s["ID"] ?>"><?php echo $s["Ten"] ?></a></h3></div>
                                            <div class="info">  
                                                <ul>
                                                    <li>Thương hiệu: <?php echo $s["Tennhasx"] ?></li>
                                                </ul>
                                            </div>

                                            <!-- Phần nhập số lượng -->
                                            <label>Số lượng: </label> 
                                            <input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty[<?php echo $s["ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["ID"]] ?>"> 

                                            <input type="hidden" name="idsp" value="<?php echo $s["ID"] ?>" />
                                            <input type="submit" name="update_qty" value="Cập nhật" class="btn btn-2" />

                                            <hr>
                                            <label style="color:red">Thành tiền: <?php $Tien = $_SESSION['cart'][$s["ID"]] * $s["Gia"]; echo number_format($Tien, 0, ',', '.') . ' VNĐ';  ?></label> 
                                            <br>
                                            <input type="submit" name="remove" value="Xóa sản phẩm này" class="btn btn-default pull-right" />   
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>  
                            </form>
                            <?php 
                                $total += $_SESSION['cart'][$s["ID"]] * $s["Gia"];
                            ?>
                        </div>
        <?php 
                        }
                    } else {
                        echo "<p>Không có sản phẩm nào trong cơ sở dữ liệu tương ứng với giỏ hàng.</p>";
                    }
                }
            } else {
                echo "<p>Giỏ hàng rỗng hoặc không hợp lệ.</p>";
            }
        }
        ?>
        <div class="row">
            <form method="POST" action="cart.php">
            <center><button type="submit" name="clear_cart" class="btnn btn btn-2  " style="margin-bottom:3px">Xóa hết giỏ hàng</button></center>
                </form>
            <div class="col-md-4 col-md-offset-8">
            <center> <a href="index.php" class="btn btn-1" >Chọn những sản phẩm khác</a></center>
            </div>
        </div>
        <div class="row">
            <div class="pricedetails">
                <div class="col-md-4 col-md-offset-8">
                    <table style="margin-right:31px">
                        <h6>Price Details</h6>
                        <tr>
                            <td>Số lượng sản phẩm </td>
                            <td><?php echo $sl ?></td>
                        </tr>
                        <tr style="border-top: 1px solid #333 ;font-size:16px" >
                            <td><h5>Tổng cộng</h5></td>
                            <td><?php echo number_format($total, 0, ',', '.') . ' VNĐ'; ?></td>
                        </tr>
                    </table>
                    <a href="checkout.php" class="btnnn btn btn-1">Mua hàng ngay</a>
                </div>
            </div>
        </div>
    </div> 
</div>  
</body>
</html>
<?php 
    ob_end_flush();
    include("Footer/footer.php");
 ?>











