
<?php
    // Kết nối cơ sở dữ liệu
    require 'inc/myconnect.php';

    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $limit = 12;

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($mysqli, "SELECT * FROM sanpham LIMIT $start, $limit");
    if(isset($_POST['submit']))
    {
        $idsp = $_POST["idsp"];
        $sl;
            if(isset($_SESSION['cart'][$idsp]))
            {
                $sl = $_SESSION['cart'][$idsp] +1;
            }
            else
            {
                $sl=1;
            }
            $_SESSION['cart'][$idsp] = $sl;        
            echo "<script>window.location.replace('http://localhost//Web_Final/index.php'); </script>";

    }

    // Hiển thị sản phẩm
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productId = $row['ID'];
            $productImg = $row['HinhAnh'];
            $productTitle = $row['Ten'];
            $productPrice = $row['Gia'];
?>
            <div class="col-product">
                <article class="card-product">
                    <div class="card-header">
                        <a href="Main/product.php?id=<?= $productId; ?>" class="card-image-link">
                            <img class="card-image" src="./Images/<?php echo $productImg; ?>" alt="<?php echo $productTitle; ?>">
                        </a>
                    </div>
                    <div class="food-info">
                        <div class="card-content">
                            <div class="card-title">
                                <a href="Main/product.php?id=<?php echo $row["ID"]; ?>" class="card-title-link"><?php echo $productTitle; ?></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="product-price">
                                <span class="current-price"><?php echo number_format($productPrice, 0, ',', '.') . ' VNĐ'; ?></span>
                            </div>
                            <div class="product-buy">
                                <a href="Main/product.php?id=<?php echo $row["ID"]; ?>" class="card-button order-item">
                                    <i class="fa-regular fa-cart-shopping-fast"></i> Chi tiết sản phẩm
                                </a>
                            </div>
                        </div> 
                    </div>
                </article>
            </div>
<?php
        }
    } else {
        echo "Không có sản phẩm nào.";
    }
?>