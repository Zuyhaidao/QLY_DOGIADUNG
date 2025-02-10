<?php 
    // Kết nối cơ sở dữ liệu
    // include('../inc/myconnect.php');
    $mysqli = new mysqli("localhost","root","","do_gia_dung");
    // Lấy tổng số lượng sản phẩm
    $result = mysqli_query($mysqli, 'SELECT COUNT(ID) AS total FROM sanpham');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    // Xác định số sản phẩm trên mỗi trang
    $limit = 12;

    // Tính tổng số trang
    $total_pages = ceil($total_records / $limit);

    // Lấy trang hiện tại từ URL, mặc định là trang 1
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Tạo liên kết phân trang
    echo '<ul class="page-nav-list">';
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo '<li class="active"><a href="#">' . $i . '</a></li>'; // Nút đang active
        } else {
            echo '<li><a href="index.php?page=' . $i . '">' . $i . '</a></li>'; // Nút bình thường
        }
    }
    echo '</ul>';
?>