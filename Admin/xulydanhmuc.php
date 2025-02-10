<?php
require '../inc/myconnect.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem nút "Tạo" đã được nhấn hay chưa
if (isset($_POST['create'])) {
    // Lấy tên danh mục từ form
    $tenDanhMuc = mysqli_real_escape_string($mysqli, $_POST['tenDanhMuc']);

    // Câu lệnh SQL để thêm danh mục
    $query = "INSERT INTO phanloai (Ten) VALUES ('$tenDanhMuc')";

    // Thực thi câu lệnh và kiểm tra
    if (mysqli_query($mysqli, $query)) {
        // Nếu thêm thành công, chuyển hướng về trang quản lý danh mục
        header('Location: qlydanhmuc.php');
    } else {
        echo "Error: " . mysqli_error($mysqli); // Hiển thị lỗi nếu có
    }
}

// Đóng kết nối
mysqli_close($mysqli);
?>
