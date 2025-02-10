<?php
require '../inc/myconnect.php';

// Kiểm tra xem ID đã được gửi từ trang trước chưa
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Chuyển ID thành kiểu số nguyên

    // Tạo câu lệnh SQL để xóa danh mục
    $query = "DELETE FROM phanloai WHERE ID = $id";

    // Thực hiện câu lệnh SQL
    if (mysqli_query($mysqli, $query)) {
        // Nếu xóa thành công, chuyển hướng về trang quản lý danh mục
        header('Location: qlydanhmuc.php');
    } else {
        echo "Error: " . mysqli_error($mysqli); // Hiển thị lỗi nếu có
    }
} else {
    echo "ID danh mục không hợp lệ.";
}

// Đóng kết nối
mysqli_close($mysqli);
?>
