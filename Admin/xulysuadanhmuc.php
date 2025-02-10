<?php
require '../inc/myconnect.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $ten = $_POST['ten'];

    // Cập nhật thông tin danh mục trong cơ sở dữ liệu
    $query = "UPDATE phanloai SET Ten = '$ten' WHERE ID = $id";

    if ($mysqli->query($query) === TRUE) {
        header('Location: qlydanhmuc.php'); // Chuyển hướng về trang quản lý danh mục
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
