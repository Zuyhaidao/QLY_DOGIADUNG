<link rel="stylesheet" href="css/product.css"/>
<link rel="stylesheet" href="../Footer/css/footer.css" />
<?php 
session_start();
$mysqli = new mysqli("localhost", "root", "", "do_gia_dung");

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối thất bại: " . $mysqli->connect_error);
}

// Initialize quantity
$quantity = 1;

// Kiểm tra xem ID sản phẩm có được truyền qua URL hay không
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Truy vấn thông tin sản phẩm theo ID
    $lenh = "SELECT * FROM sanpham WHERE ID = ".$product_id;
    $result = mysqli_query($mysqli, $lenh);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        $productTitle = $product['Ten'];
        $productImg = $product['HinhAnh'];
        $productPrice = $product['Gia'];
        $productDesc = $product['Mota'];

        // Hiển thị thông tin sản phẩm
        echo '<title>'.$productTitle.'</title>';
    } else {
        echo "Sản phẩm không tồn tại.";
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
}

// Kiểm tra form đã submit để cập nhật số lượng
if (isset($_POST['quantity'])) {
    $quantity = intval($_POST['quantity']);
}

// Xử lý khi người dùng bấm "Cập nhật số lượng"
if (isset($_POST['update'])) {
    if ($quantity < 1) {
        $quantity = 1; // Đảm bảo số lượng không nhỏ hơn 1
    } elseif ($quantity > 100) {
        $quantity = 100; // Đảm bảo số lượng không lớn hơn 100
    }
}

// Xử lý khi người dùng bấm "Thêm vào giỏ hàng"
if (isset($_POST['submit'])) {
    $idsp = $_POST['idsp'];

    // Cập nhật giỏ hàng với số lượng
    if (isset($_SESSION['cart'][$idsp])) {
        $_SESSION['cart'][$idsp] += $quantity; // Cộng thêm số lượng vào giỏ hàng
    } else {
        $_SESSION['cart'][$idsp] = $quantity; // Thêm mới sản phẩm vào giỏ hàng
    }

    // Chuyển hướng về trang giỏ hàng hoặc trang chủ
    echo "<script>window.location.replace('http://localhost/Web_Final/index.php');</script>";
}

if (isset($_POST['order_now'])) {
    $product_id = $_POST['idsp'];
    $_SESSION['cart'][$product_id] = $quantity;
    echo "<script>window.location.replace('http://localhost/Web_Final/checkout.php');</script>";
}
?> 
<div class="container">
    <div class="left-section">
        <div class="image-frame">
            <img class="product-image" src="./Images/<?php echo $productImg; ?>" alt="<?php echo $productTitle; ?>">
        </div>
    </div>
    <div class="right-section">
        <div class="product-info">
            <h2 class="product-title"><?php echo $productTitle; ?></h2>
            <div class="product-price">
                <span class="current-price"><?php echo number_format($productPrice, 0, ',', '.') . ' VNĐ'; ?></span>
            </div>
            <form method="POST">
                <div class="quantity-selector">
                    <input class="input-qty" max="100" min="1" type="number" name="quantity" value="<?php echo $quantity; ?>">
                    <button type="submit" name="update" class="update-button">Cập nhật</button>
                </div>
                <input type="hidden" name="idsp" value="<?php echo $product_id; ?>" />
            </form>
            <p class="description">Mô tả</p>
            <p class="product-description"><?php echo $productDesc; ?></p>
        </div>
        <div class="product-options">
            <div class="notebox">
                <p class="notebox-title">Ghi chú</p>
                <textarea class="text-note" id="popup-detail-note" placeholder="Nhập thông tin cần lưu ý..."></textarea>
            </div>
            <div class="modal-footer">
                <div class="price-total">
                    <span class="thanhtien">Thành tiền:</span>
                    <span class="price"><?php echo number_format($productPrice * $quantity, 0, ',', '.') . ' VNĐ'; ?></span>
                </div>
                <div class="modal-footer-control">
                <form name="form_order" method="POST" action="">
                    <input type="hidden" name="idsp" value="<?php echo $product_id ?>" />
                    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>" />
                    <button type="submit" name="order_now" class="buy-now-btn">Đặt hàng ngay</button>
                </form>
                    <form name="form3" id="ff3" method="POST" action="">
                        <button name="submit" class="card-button order-item">
                            <i class="fa-regular fa-cart-shopping-fast"></i> Thêm vào giỏ hàng
                        </button>
                        <input type="hidden" name="idsp" value="<?php echo $product_id ?>" />
                        <input type="hidden" name="quantity" value="<?php echo $quantity; ?>" /> <!-- Thêm trường ẩn cho số lượng -->
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include("../Footer/footer.php"); 
?>
