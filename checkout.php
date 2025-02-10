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
    <title>Xác nhận thông tin thanh toán</title>
</head>
    <?php 
        include("inc/myconnect.php");     // Kết nối cơ sở dữ liệu
        include("inc/truyvan.php");       // Các hàm truy vấn chung
        include("Header/header.php");     // Header của trang
        include("MenuLeft/menuleft.php");
    ?>

<?php


require "inc/myconnect.php"; // Kết nối cơ sở dữ liệu

// Kiểm tra nếu giỏ hàng rỗng
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header('Location: index.php'); // Chuyển hướng nếu giỏ hàng rỗng
    exit();
}

// Lấy thông tin người dùng từ session nếu có
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (empty($username)) {
    echo "Vui lòng đăng nhập để thanh toán";
    exit;
}

// Truy vấn thông tin người dùng dựa trên username
$user_query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($mysqli, $user_query);
$user = mysqli_fetch_assoc($result);

// Kiểm tra xem người dùng có tồn tại không
if (!$user) {
    echo "Người dùng không tồn tại.";
    exit;
}

// Lấy danh sách ID sản phẩm từ giỏ hàng
$item = array_keys($_SESSION['cart']);
$str = implode(",", $item);

// Truy vấn thông tin sản phẩm trong giỏ hàng
$query = "SELECT s.ID, s.Ten, s.Gia, s.HinhAnh, s.HSX, s.Mota, n.Ten as Tennhasx 
          FROM sanpham s 
          LEFT JOIN phanloai n ON n.ID = s.idphanloai 
          WHERE s.ID IN ($str)";
$result = $mysqli->query($query);

$total = 0; // Tổng giá trị đơn hàng

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Trang Thanh Toán</title>
    <link rel="stylesheet" href="./css/checkout.css"/>
</head>
<body>
    <div class="checkout-container">
        <h1>Thông tin thanh toán</h1>
        <table class="checkout-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    // Duyệt qua từng sản phẩm trong giỏ hàng
                    while ($s = $result->fetch_assoc()) {
                        $productId = $s["ID"];
                        $quantity = $_SESSION['cart'][$productId];
                        $price = $s["Gia"];
                        $subtotal = $quantity * $price;
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($s["Ten"]); ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo number_format($price, 0, ',', '.') . ' VNĐ'; ?></td>
                            <td><?php echo number_format($subtotal, 0, ',', '.') . ' VNĐ'; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>Giỏ hàng rỗng hoặc lỗi truy vấn.</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Tổng cộng</th>
                    <th><?php echo number_format($total, 0, ',', '.') . ' VNĐ'; ?></th>
                </tr>
            </tfoot>
        </table>

        <form action="" method="POST">
            <h2>Thông tin khách hàng</h2>
            <label for="full_name">Họ tên:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['sdt']); ?>" required>
            
            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" required><?php echo htmlspecialchars($user['diachi']); ?></textarea>

            <label for="textnote">Ghi chú:</label>
            <textarea id="textnote" name="textnote" required></textarea>

            <button type="submit" name="accept_order" class="btn_order">Xác nhận thanh toán</button>
        </form>
    </div>
    <?php include("Footer/footer.php"); ?>
</body>

<?php 
    if (isset($_POST['accept_order'])) {
        // Lấy thông tin từ form
        $full_name = mysqli_real_escape_string($mysqli, $_POST['full_name']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        $textnote = mysqli_real_escape_string($mysqli, $_POST['textnote']);
    
        // Truy xuất id_user từ username
        $user_query = "SELECT id FROM user WHERE username = '$username'";
        $user_result = mysqli_query($mysqli, $user_query);
        
        if (!$user_result) {
            die("Lỗi truy vấn: " . mysqli_error($mysqli)); // In case the query fails
        }
        
        $user = mysqli_fetch_assoc($user_result);
        
        if ($user) {
            $id_user = $user['id'];
    
            // Chèn đơn hàng vào bảng donhang với id_user
            $insert_order_query = "INSERT INTO donhang (id_user, ngay_dat, tong_tien, trang_thai) VALUES ('$id_user', NOW(), '$total', 'Đã thanh toán')";
    
            if (mysqli_query($mysqli, $insert_order_query)) {
                // Lấy ID đơn hàng vừa chèn
                $order_id = mysqli_insert_id($mysqli);
                
                // Bước 2: Chèn chi tiết đơn hàng vào bảng chitiet_donhang
                foreach ($_SESSION['cart'] as $productId => $quantity) {
                    // Lấy giá sản phẩm từ cơ sở dữ liệu
                    $product_query = "SELECT Gia FROM sanpham WHERE ID = $productId";
                    $product_result = mysqli_query($mysqli, $product_query);
                    $product = mysqli_fetch_assoc($product_result);
                    $price = $product['Gia'];
    
                    // Chèn vào bảng chitiet_donhang
                    $insert_detail_query = "INSERT INTO chitiet_donhang (id_donhang, id_sanpham, so_luong, gia) VALUES ($order_id, $productId, $quantity, $price)";
                    mysqli_query($mysqli, $insert_detail_query);
                }
    
                // Xóa giỏ hàng
                unset($_SESSION['cart']); 
                echo "<script>window.location.replace('http://localhost/Web_Final/process_order.php');</script>";
    
            } else {
                echo "Có lỗi trong việc tạo đơn hàng: " . mysqli_error($mysqli);
            }
        } else {
            echo "Không tìm thấy người dùng với username: $username"; // Thông báo nếu không tìm thấy user
        }
    }    
?>
</html>