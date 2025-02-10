<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lí đồ gia dụng</title>
    <link rel="stylesheet" href="./assets/font/font-awesome-pro-v6-6.2.0/css/all.css" />
    <link rel="stylesheet" href="./css/main.css"/>
    <link rel="stylesheet" href="./css/category.css"/>
    <link rel="stylesheet" href="./Header/css/headertop.css" />
    <link rel="stylesheet" href="./Header/css/headermiddle.css" />
    <link rel="stylesheet" href="./Header/css/headerbottom.css" />
    <link rel="stylesheet" href="./Main/css/slider.css" />
    <link rel="stylesheet" href="./Footer/css/footer.css" />
</head>
<body>
    <?php 
        include("Header/header.php");
    ?>
    
    <?php
    include("inc/myconnect.php");

	$limit = 12;
    $idphanloai = $_GET["idphanloai"];
    $result = mysqli_query($mysqli, 'select count(ID) as total from sanpham where idphanloai = '.$idphanloai );
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];	
	if ($total_records == 0) {
        header('Location: index.php');
        exit;
    }

    $total_pages = ceil($total_records / $limit);
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($current_page - 1) * $limit;

    $product_query = "SELECT * FROM sanpham where idphanloai = $idphanloai LIMIT $start, $limit";
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
                                <a href="Main/product.php?id=<?php echo $row["ID"]; ?>" class="card-button order-item">
                                    <i class="fa-regular fa-cart-shopping-fast"></i> Chi tiết sản phẩm
                                </a>
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
            echo '<li><a href="category.php?idphanloai=' . $idphanloai . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }
    ?>
    </ul>

    <?php include("Footer/footer.php"); ?>
</body>
</html>