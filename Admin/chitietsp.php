<link rel="stylesheet" href="css/chitietsp.css"/>
<?php
    require '../inc/myconnect.php'; 
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
?>
<div class="container">
    <div class="left-section">
        <div class="image-frame">
            <img class="product-image" src="../Images/<?php echo $productImg; ?>" alt="<?php echo $productTitle; ?>">
        </div>
    </div>
    <div class="right-section">
        <div class="product-info">
            <h2 class="product-title"><?php echo $productTitle; ?></h2>
            <div class="product-price">
                <span class="current-price"><?php echo number_format($productPrice, 0, ',', '.') . ' VNĐ'; ?></span>
            </div>
            <p class="description">Mô tả</p>
            <p class="product-description"><?php echo $productDesc; ?></p>
        </div>
    </div>
</div>