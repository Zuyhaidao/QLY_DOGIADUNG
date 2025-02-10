<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lí đồ gia dụng</title>
    <link rel="stylesheet" href="./assets/font/font-awesome-pro-v6-6.2.0/css/all.css" />
    <link rel="stylesheet" href="./css/main.css"/>
    <link rel="stylesheet" href="./css/timkiem.css"/>
    <link rel="stylesheet" href="./Header/css/headertop.css" />
    <link rel="stylesheet" href="./Header/css/headermiddle.css" />
    <link rel="stylesheet" href="./Header/css/headerbottom.css" />
    <link rel="stylesheet" href="./Main/css/slider.css" />
    <link rel="stylesheet" href="./Footer/css/footer.css" />
</head>
<body>
    <?php 
        include("inc/myconnect.php");
        include("inc/truyvan.php");
        include("Header/header.php");
    ?>

    <?php
    include("inc/myconnect.php");

    $tentimkiem = $_GET["txttimkiem"];
    $limit = 12;

    // Count total records for pagination
    $count_query = "SELECT count(ID) as total FROM sanpham WHERE Ten LIKE '%$tentimkiem%'";
    $result = mysqli_query($mysqli, $count_query);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    if (empty($tentimkiem)) {
        echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
        exit;
    }

    // Pagination logic
    $total_pages = ceil($total_records / $limit);
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($current_page - 1) * $limit;

    // Fetch the products for the current page
    $product_query = "SELECT * FROM sanpham WHERE Ten LIKE '%$tentimkiem%' LIMIT $start, $limit";
    $result = mysqli_query($mysqli, $product_query);
    ?>
    <div class="home-products" id="home-products">
        <div class="col-product">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <article class="card-product">
                    <div class="card-header">
                        <a href="Main/product.php?id=<?= $row['ID']; ?>" class="card-image-link">
                            <img class="card-image" src="./Images/<?= $row['HinhAnh']; ?>" alt="<?= $row['Ten']; ?>">
                        </a>
                    </div>
                    <div class="food-info">
                        <div class="card-content">
                            <div class="card-title">
                                <a href="Main/product.php?id=<?= $row['ID']; ?>" class="card-title-link"><?= $row['Ten']; ?></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="product-price">
                                <span class="current-price"><?= number_format($row['Gia'], 0, ',', '.') . ' VNĐ'; ?></span>
                            </div>
                            <div class="product-buy">
                                <button class="card-button order-item">
                                    <i class="fa-regular fa-cart-shopping-fast"></i> Đặt hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>

        <!-- Pagination -->
        <ul class="page-nav-list">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo '<li class="active"><a href="#">' . $i . '</a></li>';
            } else {
                echo '<li><a href="timkiem.php?txttimkiem=' . $tentimkiem . '&page=' . $i . '">' . $i . '</a></li>';
            }
        }
        ?>
        </ul>

    <?php include("Footer/footer.php"); ?>
</body>
</html>